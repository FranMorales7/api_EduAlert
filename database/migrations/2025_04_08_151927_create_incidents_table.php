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
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->boolean('is_solved')->default(false);
            
            // si se elimina un estudiante, se eliminan aquellos incidentes relacionados
            $table->foreignId('student_id')->nullable()->constrained('students')->onDelete('cascade');
            // si se elimina un profesor, se eliminan aquellos incidentes relacionados
            $table->foreignId('teacher_id')->nullable()->constrained('teachers')->onDelete('cascade');
            // si se elimina una clase, se eliminan aquellos incidentes relacionados
            $table->foreignId('class_id')->nullable()->constrained('classes')->onDelete('cascade');
            
            $table->timestamps(); // created at y updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};
