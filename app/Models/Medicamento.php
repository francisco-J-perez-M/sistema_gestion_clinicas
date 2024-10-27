<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;

    protected $table = 'medicamentos'; // Nombre de la tabla

    protected $fillable = [
        'nombre',           // Nombre del medicamento
        'dosis',            // Dosis recomendada
        'unidad',           // Unidad de medida (mg, ml, etc.)
        'cantidad',         // Cantidad disponible
        'descripcion',      // Descripción opcional
        'fecha_vencimiento',// Fecha de vencimiento
    ];

    // Puedes agregar relaciones aquí si las necesitas
}
