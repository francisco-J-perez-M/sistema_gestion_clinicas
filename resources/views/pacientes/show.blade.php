@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Paciente</h1>

        <ul>
            <li>Nombres: {{ $paciente->nombres }}</li>
            <li>Apellido Paterno: {{ $paciente->apellido_paterno }}</li>
            <li>Apellido Materno: {{ $paciente->apellido_materno }}</li>
            <li>Fecha de Nacimiento: {{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->format('d/m/Y') }}</li>
            <li>Género: {{ $paciente->genero }}</li>
            <li>Teléfono: {{ $paciente->telefono }}</li>
            <li>Email: {{ $paciente->email }}</li>
            <li>NSS: {{ $paciente->nss }}</li>
            <li>Peso: {{ $paciente->peso }} kg</li>
            <li>Altura: {{ $paciente->altura }} m</li>
            <li>Tipo de Sangre: {{ $paciente->tipo_sangre }}</li>
        </ul>

        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection
