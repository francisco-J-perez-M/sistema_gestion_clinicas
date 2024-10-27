<?php

namespace App\Http\Controllers;

use App\Models\Medicamento; // Asegúrate de que este modelo esté creado
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    /**
     * Muestra la lista de medicamentos.
     */
    public function index()
    {
        $medicamentos = Medicamento::all(); // Obtener todos los medicamentos
        return view('medicamentos.index', compact('medicamentos'));
    }

    /**
     * Muestra el formulario para crear un nuevo medicamento.
     */
    public function create()
    {
        return view('medicamentos.create'); // Vista para crear un nuevo medicamento
    }

    /**
     * Almacena un nuevo medicamento en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'dosis' => 'required|string|max:255',
            'unidad' => 'required|string|max:50',
            'cantidad' => 'required|integer|min:1',
            'descripcion' => 'nullable|string',
            'fecha_vencimiento' => 'nullable|date',
        ]);

        Medicamento::create($request->all()); // Crear nuevo medicamento

        return redirect()->route('medicamentos.index')->with('success', 'Medicamento creado exitosamente.');
    }

    /**
     * Muestra el formulario para editar un medicamento existente.
     */
    public function edit($id)
    {
        $medicamento = Medicamento::findOrFail($id); // Obtener medicamento por ID
        return view('medicamentos.edit', compact('medicamento'));
    }

    /**
     * Actualiza un medicamento en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'dosis' => 'required|string|max:255',
            'unidad' => 'required|string|max:50',
            'cantidad' => 'required|integer|min:1',
            'descripcion' => 'nullable|string',
            'fecha_vencimiento' => 'nullable|date',
        ]);

        $medicamento = Medicamento::findOrFail($id);
        $medicamento->update($request->all()); // Actualizar medicamento

        return redirect()->route('medicamentos.index')->with('success', 'Medicamento actualizado exitosamente.');
    }
    public function show($id)
    {
        // Buscar el medicamento por su ID
        $medicamento = Medicamento::findOrFail($id);

        // Pasar el medicamento a la vista
        return view('medicamentos.show', compact('medicamento'));
    }

    /**
     * Elimina un medicamento de la base de datos.
     */
    public function destroy($id)
    {
        $medicamento = Medicamento::findOrFail($id);
        $medicamento->delete(); // Eliminar medicamento

        return redirect()->route('medicamentos.index')->with('success', 'Medicamento eliminado exitosamente.');
    }
}
