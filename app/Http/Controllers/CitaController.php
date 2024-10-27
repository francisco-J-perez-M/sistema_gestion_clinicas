<?php

namespace App\Http\Controllers;

use App\Models\Cita; // Asegúrate de que este modelo esté creado
use App\Models\Medico;
use App\Models\Paciente; // Asegúrate de que este modelo esté creado
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Muestra el formulario para crear una nueva cita.
     */
    public function create()
    {
        // Obtener la lista de médicos y pacientes
        $medicos = Medico::all();
        $pacientes = Paciente::all(); // Obtener todos los pacientes

        // Pasar las variables a la vista
        return view('citas.create', compact('medicos', 'pacientes'));
    }

    /**
     * Almacena una nueva cita en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos de la solicitud
        $request->validate([
            'id_medico' => 'required|exists:medicos,id',
            'id_paciente' => 'required|exists:pacientes,id', // Validar paciente
            'fecha_hora' => 'required|date',
        ]);

        // Crear una nueva cita
        Cita::create([
            'id_medico' => $request->id_medico,
            'id_paciente' => $request->id_paciente, // Guardar paciente
            'fecha_hora' => $request->fecha_hora,
        ]);

        // Redirigir a la lista de citas con un mensaje de éxito
        return redirect()->route('citas.index')->with('success', 'Cita creada exitosamente.');
    }

    /**
     * Muestra la lista de citas.
     */
    public function index()
    {
        // Obtener todas las citas
        $citas = Cita::all();

        // Pasar las citas a la vista
        return view('citas.index', compact('citas'));
    }

    /**
     * Muestra el formulario para editar una cita existente.
     */
    public function edit($id)
    {
        // Obtener la cita por su ID
        $cita = Cita::findOrFail($id);

        // Obtener la lista de médicos y pacientes
        $medicos = Medico::all();
        $pacientes = Paciente::all();

        // Pasar las variables a la vista
        return view('citas.edit', compact('cita', 'medicos', 'pacientes'));
    }

    /**
     * Actualiza una cita en la base de datos.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos de la solicitud
        $request->validate([
            'id_medico' => 'required|exists:medicos,id',
            'id_paciente' => 'required|exists:pacientes,id', // Validar paciente
            'fecha_hora' => 'required|date',
        ]);

        // Encontrar la cita y actualizarla
        $cita = Cita::findOrFail($id);
        $cita->update([
            'id_medico' => $request->id_medico,
            'id_paciente' => $request->id_paciente, // Actualizar paciente
            'fecha_hora' => $request->fecha_hora,
        ]);

        // Redirigir a la lista de citas con un mensaje de éxito
        return redirect()->route('citas.index')->with('success', 'Cita actualizada exitosamente.');
    }

    /**
     * Eliminar una cita de la base de datos.
     */
    public function destroy($id)
    {
        // Encontrar la cita y eliminarla
        $cita = Cita::findOrFail($id);
        $cita->delete();

        // Redirigir a la lista de citas con un mensaje de éxito
        return redirect()->route('citas.index')->with('success', 'Cita eliminada exitosamente.');
    }
}
