<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    // Obtener todos los usuarios
    public function index()
    {
         // Generar las relaciones eloquent del modelo
         $user = User::with(['teacher'])->get();

         return response()->json($user);
    }

    // Crear un nuevo usuario
    public function store(Request $request)
    {
        // Primero valida
        $request->merge([
            'is_admin' => filter_var($request->input('is_admin'), FILTER_VALIDATE_BOOLEAN),
            'is_active' => filter_var($request->input('is_active'), FILTER_VALIDATE_BOOLEAN),
        ]);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'last_name_1' => 'required|string|max:255',
            'last_name_2' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'is_admin' => 'boolean',
            'is_active' => 'boolean',
        ]);

        // Luego maneja la imagen si viene
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('users', 'public');
            $validated['image'] = $path;
        }

        $user = DB::transaction(function () use ($validated) {
            $user = User::updateOrCreate([
                'name' => $validated['name'],
                'last_name_1' => $validated['last_name_1'],
                'last_name_2' => $validated['last_name_2'] ?? null,
                'image' => $validated['image'] ?? null,
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'is_admin' => $validated['is_admin'] ?? false,
                'is_active' => $validated['is_active'] ?? true,
                'remember_token' => Str::random(10),
            ]);

            $relatedData = [
                'user_id' => $user->id,
                'name' => $user->name,
                'last_name_1' => $user->last_name_1,
                'last_name_2' => $user->last_name_2,
                'image' => $user->image,
                'email' => $user->email,
                'password' => $user->password,
                'is_admin' => $user->is_admin,
                'is_active' => $user->is_active,
            ];

            $user->is_admin
                ? Manager::updateOrCreate($relatedData)
                : Teacher::updateOrCreate($relatedData);

            return $user;
        });

        return response()->json($user, 201);
    }


    // Obtener un solo usuario
    public function show($id)
    {
        return User::findOrFail($id);
    }

    // Actualizar un usuario
    public function update(Request $request, $id)
    {
    $user = User::findOrFail($id);
    $oldIsAdmin = $user->is_admin;

    $validated = $request->validate([
        'name' => 'sometimes|string|max:255',
        'last_name_1' => 'sometimes|string|max:255',
        'last_name_2' => 'sometimes|string|max:255',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'email' => 'sometimes|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:6',
        'is_admin' => 'boolean',
        'is_active' => 'boolean',
    ]);

    DB::transaction(function () use ($request, $user, $validated, $oldIsAdmin) {
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        if ($request->hasFile('image')) {
            // Elimina imagen anterior si existe
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            $path = $request->file('image')->store('users', 'public');
            $validated['image'] = $path;
        }

        $user->fill($validated);
        $user->save();

        if ($oldIsAdmin && !$user->is_admin) {
            Manager::where('user_id', $user->id)->delete();
            Teacher::updateOrCreate(
                ['user_id' => $user->id],
                $validated + ['user_id' => $user->id]
            );
        } elseif (!$oldIsAdmin && $user->is_admin) {
            Teacher::where('user_id', $user->id)->delete();
            Manager::updateOrCreate(
                ['user_id' => $user->id],
                $validated + ['user_id' => $user->id]
            );
        } else {
            if ($user->is_admin) {
                Manager::updateOrCreate(
                    ['user_id' => $user->id],
                    $validated + ['user_id' => $user->id]
                );
            } else {
                Teacher::updateOrCreate(
                    ['user_id' => $user->id],
                    $validated + ['user_id' => $user->id]
                );
            }
        }
    });

    return response()->json($user);
    }

    // Eliminar un usuario
    public function destroy($id)
    {
    $user = User::findOrFail($id);

    // Eliminar de la tabla correspondiente
    if ($user->is_admin) {
        Manager::where('user_id', $user->id)->delete();
    } else {
        Teacher::where('user_id', $user->id)->delete();
    }

    $user->delete();

    return response()->json(['message' => 'Usuario y datos relacionados eliminados']);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = $request->user();

        if (!Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['La contraseña actual no es correcta.'],
            ]);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json(['message' => 'Contraseña actualizada correctamente.']);
    }
}
