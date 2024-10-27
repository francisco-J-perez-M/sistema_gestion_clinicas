<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del medicamento
            $table->string('dosis'); // Dosis recomendada
            $table->string('unidad'); // Unidad de medida (mg, ml, etc.)
            $table->integer('cantidad'); // Cantidad disponible
            $table->text('descripcion')->nullable(); // Descripción opcional
            $table->date('fecha_vencimiento')->nullable(); // Fecha de vencimiento
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicamentos');
    }
};
