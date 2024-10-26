@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Paciente</h1>

        <form action="{{ route('pacientes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nombres">Nombres</label>
                <input type="text" name="nombres" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="apellido_paterno">Apellido Paterno</label>
                <input type="text" name="apellido_paterno" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="apellido_materno">Apellido Materno</label>
                <input type="text" name="apellido_materno" class="form-control">
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="genero">Género</label>
                <select name="genero" class="form-control" required>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                    <option value="otro">Otro</option>
                </select>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nss">NSS</label>
                <input type="text" name="nss" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="peso">Peso (kg)</label>
                <input type="number" step="0.01" name="peso" class="form-control">
            </div>
            <div class="form-group">
                <label for="altura">Altura (m)</label>
                <input type="number" step="0.01" name="altura" class="form-control">
            </div>
            <div class="form-group">
                <label for="tipo_sangre">Tipo de Sangre</label>
                <select name="tipo_sangre" class="form-control">
                    <option value="">Seleccione un tipo de sangre</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" name="foto" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
