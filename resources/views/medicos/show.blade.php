@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Médico</h1>
    <p><strong>Nombre:</strong> {{ $medico->nombre }}</p>
    <p><strong>Especialidad:</strong> {{ $medico->especialidad }}</p>
    <p><strong>Teléfono:</strong> {{ $medico->telefono }}</p>
    <p><strong>Email:</strong> {{ $medico->email }}</p>
    <p><strong>Cédula:</strong> {{ $medico->cedula }}</p>
    @if($medico->foto)
        <p><strong>Foto:</strong><br><img src="{{ asset('storage/' . $medico->foto) }}" width="150"></p>
    @endif
    <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Regresar</a>
</div>
@endsection
