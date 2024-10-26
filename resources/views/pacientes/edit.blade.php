@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Paciente</h1>

        <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombres">Nombres</label>
                <input type="text" name="nombres" class="form-control" value="{{ $paciente->nombres }}" required>
            </div>
            <div class="form-group">
                <label for="apellido_paterno">Apellido Paterno</label>
                <input type="text" name="apellido_paterno" class="form-control" value="{{ $paciente->apellido_paterno }}" required>
            </div>
            <div class="form-group">
                <label for="apellido_materno">Apellido Materno</label>
                <input type="text" name="apellido_materno" class="form-control" value="{{ $paciente->apellido_materno }}">
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control" value="{{ $paciente->fecha_nacimiento }}" required>
            </div>
            <div class="form-group">
                <label for="genero">Género</label>
                <select name="genero" class="form-control" required>
                    <option value="masculino" {{ $paciente->genero == 'masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="femenino" {{ $paciente->genero == 'femenino' ? 'selected' : '' }}>Femenino</option>
                    <option value="otro" {{ $paciente->genero == 'otro' ? 'selected' : '' }}>Otro</option>
                </select>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="{{ $paciente->telefono }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $paciente->email }}" required>
            </div>
            <div class="form-group">
                <label for="nss">NSS</label>
                <input type="text" name="nss" class="form-control" value="{{ $paciente->nss }}" required>
            </div>
            <div class="form-group">
                <label for="peso">Peso (kg)</label>
                <input type="number" step="0.01" name="peso" class="form-control" value="{{ $paciente->peso }}">
            </div>
            <div class="form-group">
                <label for="altura">Altura (m)</label>
                <input type="number" step="0.01" name="altura" class="form-control" value="{{ $paciente->altura }}">
            </div>
            <div class="form-group">
                <label for="tipo_sangre">Tipo de Sangre</label>
                <input type="text" name="tipo_sangre" class="form-control" value="{{ $paciente->tipo_sangre }}">
            </div>
            <div class="form-group">
                <label for="foto">Actualizar Foto</label>
                <input type="file" name="foto" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
