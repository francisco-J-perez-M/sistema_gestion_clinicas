@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Lista de Medicamentos</h3>
    <h5>CRUD: Medicamentos</h5>
    <hr><br>

    <a href="{{ route('medicamentos.create') }}" class="btn btn-primary mb-3">Nuevo Medicamento</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Dosis</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicamentos as $medicamento)
                <tr>
                    <td>{{ $medicamento->id }}</td>
                    <td>{{ $medicamento->nombre }}</td>
                    <td>{{ $medicamento->descripcion }}</td>
                    <td>{{ $medicamento->dosis }}</td>
                    <td>
                        <a href="{{ route('medicamentos.show', $medicamento->id) }}" class="btn btn-info">Mostrar</a>
                        <a href="{{ route('medicamentos.edit', $medicamento->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('medicamentos.destroy', $medicamento->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
