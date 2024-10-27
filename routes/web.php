<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;

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
