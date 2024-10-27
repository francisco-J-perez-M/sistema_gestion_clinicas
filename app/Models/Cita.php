<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_medico',
        'id_paciente', // Agrega este campo
        'fecha_hora',
    ];

    // Puedes agregar las relaciones aquí si las necesitas
    public function medico()
    {
        return $this->belongsTo(Medico::class, 'id_medico');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }
}
