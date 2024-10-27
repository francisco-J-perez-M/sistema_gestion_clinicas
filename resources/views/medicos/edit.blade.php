@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Médico</h1>
    <form action="{{ route('medicos.update', $medico->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Esto es importante para indicar que es una actualización -->
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $medico->nombre) }}" required>
    </div>
    <div class="mb-3">
        <label for="especialidad" class="form-label">Especialidad</label>
        <input type="text" class="form-control" id="especialidad" name="especialidad" value="{{ old('especialidad', $medico->especialidad) }}" required>
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $medico->telefono) }}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $medico->email) }}" required>
    </div>
    <div class="mb-3">
        <label for="cedula" class="form-label">Cédula</label>
        <input type="text" class="form-control" id="cedula" name="cedula" value="{{ old('cedula', $medico->cedula) }}" required>
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto">
        @if($medico->foto)
            <img src="{{ Storage::url($medico->foto) }}" alt="Foto del Médico" width="100">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Actualizar Médico</button>
</form>

</div>
@endsection
