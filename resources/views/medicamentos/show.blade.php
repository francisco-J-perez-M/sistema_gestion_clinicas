@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Detalles del Medicamento</h3>
    <h5>Nombre: {{ $medicamento->nombre }}</h5>
    <h5>Descripción: {{ $medicamento->descripcion }}</h5>
    <h5>Dosis: {{ $medicamento->dosis }}</h5>
    <h5>Unidad: {{ $medicamento->unidad }}</h5>
    <h5>Cantidad Disponible: {{ $medicamento->cantidad }}</h5>
    <h5>Fecha de Vencimiento: {{ \Carbon\Carbon::parse($medicamento->fecha_vencimiento)->format('d/m/Y') }}</h5>
    
    <hr>

    <a href="{{ route('medicamentos.index') }}" class="btn btn-primary">Volver a la lista</a>
    <a href="{{ route('medicamentos.edit', $medicamento->id) }}" class="btn btn-warning">Editar</a>
    
    <form action="{{ route('medicamentos.destroy', $medicamento->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
</div>
@endsection
