<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::all();
        return view('medicos.index', compact('medicos'));
    }

    public function create()
{
    return view('medicos.create');
}


public function store(Request $request)
{
    $validatedData = $request->validate([
        'nombre' => 'required|string|max:100',
        'especialidad' => 'required|string|max:100',
        'telefono' => 'nullable|string|max:20',
        'email' => 'required|email|unique:medicos,email',
        'cedula' => 'required|string|unique:medicos,cedula|max:20',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'activo' => 'boolean',
    ]);

    if ($request->hasFile('foto')) {
        $path = $request->file('foto')->store('fotos_medicos', 'public');
        $validatedData['foto'] = $path;
    }

    Medico::create($validatedData);
    return redirect()->route('medicos.index')->with('success', 'Médico agregado con éxito.');
}


    public function show($id)
    {
        $medico = Medico::findOrFail($id);
        return view('medicos.show', compact('medico'));
    }

    public function edit($id)
    {
        $medico = Medico::findOrFail($id);
        return view('medicos.edit', compact('medico'));
    }

    public function update(Request $request, $id)
{
    $medico = Medico::findOrFail($id);

    $validatedData = $request->validate([
        'nombre' => 'sometimes|string|max:100',
        'especialidad' => 'sometimes|string|max:100',
        'telefono' => 'nullable|string|max:20',
        'email' => 'sometimes|email|unique:medicos,email,' . $id,
        'cedula' => 'sometimes|string|unique:medicos,cedula,' . $id . '|max:20',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'activo' => 'boolean',
    ]);

    if ($request->hasFile('foto')) {
        // Eliminar la foto anterior si existe
        if ($medico->foto) {
            Storage::disk('public')->delete($medico->foto);
        }
        $path = $request->file('foto')->store('fotos_medicos', 'public');
        $validatedData['foto'] = $path;
    }

    $medico->update($validatedData);
    return redirect()->route('medicos.index')->with('success', 'Médico actualizado con éxito.');
}


    public function destroy($id)
    {
        $medico = Medico::findOrFail($id);

        if ($medico->foto) {
            Storage::disk('public')->delete($medico->foto);
        }

        $medico->delete();
        return redirect()->route('medicos.index')->with('success', 'Médico eliminado con éxito.');
    }
}
