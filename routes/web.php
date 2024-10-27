<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\MedicamentoController;

Route::get('/', [PacienteController::class, 'index']);

// Ruta para listar pacientes
Route::get('pacientes', [PacienteController::class, 'index'])->name('pacientes.index');

// Ruta para mostrar el formulario de creación de paciente
Route::get('pacientes/create', [PacienteController::class, 'create'])->name('pacientes.create');

// Ruta para almacenar un nuevo paciente
Route::post('pacientes', [PacienteController::class, 'store'])->name('pacientes.store');

// Ruta para mostrar un paciente específico
Route::get('pacientes/{paciente}', [PacienteController::class, 'show'])->name('pacientes.show');

// Ruta para mostrar el formulario de edición de un paciente
Route::get('pacientes/{paciente}/edit', [PacienteController::class, 'edit'])->name('pacientes.edit');

// Ruta para actualizar un paciente existente
Route::put('pacientes/{paciente}', [PacienteController::class, 'update'])->name('pacientes.update');

// Ruta para eliminar un paciente
Route::delete('pacientes/{paciente}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');

Route::get('/medicos', [MedicoController::class, 'index'])->name('medicos.index');
Route::get('/medicos/create', [MedicoController::class, 'create'])->name('medicos.create');
Route::post('/medicos', [MedicoController::class, 'store'])->name('medicos.store');
Route::get('/medicos/{id}', [MedicoController::class, 'show'])->name('medicos.show');
Route::put('/medicos/{id}', [MedicoController::class, 'update'])->name('medicos.update');
Route::delete('/medicos/{id}', [MedicoController::class, 'destroy'])->name('medicos.destroy');
Route::get('/medicos/{id}/edit', [MedicoController::class, 'edit'])->name('medicos.edit');

// Mostrar una lista de citas
Route::get('/citas', [CitaController::class, 'index'])->name('citas.index');

// Mostrar el formulario para crear una nueva cita
Route::get('/citas/create', [CitaController::class, 'create'])->name('citas.create');

// Crear una nueva cita
Route::post('/citas', [CitaController::class, 'store'])->name('citas.store');

// Mostrar una cita específica
Route::get('/citas/{id}', [CitaController::class, 'show'])->name('citas.show');

// Mostrar el formulario para editar una cita existente
Route::get('/citas/{id}/edit', [CitaController::class, 'edit'])->name('citas.edit');

// Actualizar una cita existente
Route::put('/citas/{id}', [CitaController::class, 'update'])->name('citas.update');

// Eliminar una cita
Route::delete('/citas/{id}', [CitaController::class, 'destroy'])->name('citas.destroy');



// Rutas para el recurso de Medicamento
Route::get('medicamentos', [MedicamentoController::class, 'index'])->name('medicamentos.index'); // Listar medicamentos
Route::get('medicamentos/create', [MedicamentoController::class, 'create'])->name('medicamentos.create'); // Mostrar formulario de creación
Route::post('medicamentos', [MedicamentoController::class, 'store'])->name('medicamentos.store'); // Almacenar nuevo medicamento
Route::get('medicamentos/{id}/edit', [MedicamentoController::class, 'edit'])->name('medicamentos.edit'); // Mostrar formulario de edición
Route::put('medicamentos/{id}', [MedicamentoController::class, 'update'])->name('medicamentos.update'); // Actualizar medicamento
Route::delete('medicamentos/{id}', [MedicamentoController::class, 'destroy'])->name('medicamentos.destroy'); // Eliminar medicamento
Route::get('medicamentos/{medicamento}', [MedicamentoController::class, 'show'])->name('medicamentos.show');


