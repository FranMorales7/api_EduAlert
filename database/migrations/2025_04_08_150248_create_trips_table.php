<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->boolean('is_solved')->default(false);

            // Si se elimina un estudiante, las salidas relacionadas se actualizan a NULL (no se eliminan)
            $table->foreignId('student_id')->nullable()->constrained('students')->onDelete('set null');
            // Si se elimina un profesor, las salidas relacionadas se actualizan a NULL (no se eliminan)
            $table->foreignId('teacher_id')->nullable()->constrained('teachers')->onDelete('set null');
            // Si se elimina una clase, las salidas relacionadas se actualizan a NULL (no se eliminan)
            $table->foreignId('lesson_id')->nullable()->constrained('lessons')->onDelete('set null');

            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exits');
    }
};
