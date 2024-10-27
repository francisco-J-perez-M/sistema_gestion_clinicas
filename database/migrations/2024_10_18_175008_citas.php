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
        Schema::create('citas', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->unsignedBigInteger('id_medico'); // ID del médico
            $table->unsignedBigInteger('id_paciente'); // ID del paciente
            $table->dateTime('fecha_hora'); // Fecha y hora de la cita
            $table->timestamps(); // Timestamps para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
