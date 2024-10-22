<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'fecha_nacimiento',
        'genero',
        'telefono',
        'email',
        'nss',
        'peso',
        'altura',
        'tipo_sangre',
    ];

    /**
     * Los atributos que deben ser tratados como fechas.
     *
     * @var array
     */
    protected $dates = [
        'fecha_nacimiento',
    ];
}
