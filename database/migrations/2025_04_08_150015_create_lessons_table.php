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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->string('location');
            // Si se borra un profesor, la clase se mantiene
            $table->foreignId('teacher_id')->nullable()->constrained('teachers')->onDelete('set null');
            // Si se borra un grupo, la clase se eliminará también
            $table->foreignId('group_id')->nullable()->constrained('groups')->onDelete('cascade');
            // Día de la semana que se imparte la clase (1-lunes 7-domingo)
            $table->integer('day')->nullable();
            // Hora de inicio y fin de la clase
            $table->time('starts_at');
            $table->time('ends_at');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
