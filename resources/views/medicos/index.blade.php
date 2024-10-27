@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Médicos</h1>
    <a href="{{ route('medicos.create') }}" class="btn btn-primary">Agregar Médico</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicos as $medico)
            <tr>
                <td>{{ $medico->id }}</td>
                <td>{{ $medico->nombre }}</td>
                <td>{{ $medico->especialidad }}</td>
                <td>{{ $medico->email }}</td>
                <td>{{ $medico->telefono }}</td>
                <td>
                    @if($medico->foto)
                        <img src="{{ asset('storage/' . $medico->foto) }}" width="50" alt="Foto de {{ $medico->nombre }}">
                    @endif
                </td>
                <td>
                    <a href="{{ route('medicos.show', $medico->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('medicos.edit', $medico->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este médico?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
