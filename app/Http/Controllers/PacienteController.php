<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $pacientes = Paciente::all();
    return view('pacientes.index', compact('pacientes'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Muestra el formulario para crear un nuevo paciente
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida los datos recibidos
        $validated = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|in:masculino,femenino,otro',
            'telefono' => 'nullable|string|max:15',
            'email' => 'required|email|unique:pacientes,email',
            'nss' => 'required|string|unique:pacientes,nss',
            'peso' => 'nullable|numeric|min:0',
            'altura' => 'nullable|numeric|min:0',
            'tipo_sangre' => 'nullable|string|max:3',
        ]);

        // Crea el paciente en la base de datos
        Paciente::create($validated);

        // Redirige con un mensaje de éxito
        return redirect()->route('pacientes.index')->with('success', 'Paciente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $paciente = Paciente::findOrFail($id);
    
    // Asegúrate de que la fecha sea un objeto DateTime
    $fechaNacimiento = \Carbon\Carbon::parse($paciente->fecha_nacimiento);

    return view('pacientes.show', compact('paciente', 'fechaNacimiento'));
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        // Muestra el formulario para editar un paciente
        return view('pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        // Valida los datos
        $validated = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|in:masculino,femenino,otro',
            'telefono' => 'nullable|string|max:15',
            'email' => 'required|email|unique:pacientes,email,' . $paciente->id,
            'nss' => 'required|string|unique:pacientes,nss,' . $paciente->id,
            'peso' => 'nullable|numeric|min:0',
            'altura' => 'nullable|numeric|min:0',
            'tipo_sangre' => 'nullable|string|max:3',
        ]);

        // Actualiza el paciente en la base de datos
        $paciente->update($validated);

        // Redirige con un mensaje de éxito
        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        // Elimina el paciente
        $paciente->delete();

        // Redirige con un mensaje de éxito
        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado exitosamente.');
    }
}
