@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Pacientes</h1>
        <a href="{{ route('pacientes.create') }}" class="btn btn-primary">Agregar Paciente</a>
        
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes as $paciente)
                    <tr>
                        <td>{{ $paciente->id }}</td>
                        <td>{{ $paciente->nombres }}</td>
                        <td>{{ $paciente->apellido_paterno }} {{ $paciente->apellido_materno }}</td>
                        <td>{{ $paciente->email }}</td>
                        <td>
                            <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este paciente?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
