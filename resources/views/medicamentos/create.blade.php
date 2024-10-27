@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Crear Nuevo Medicamento</h3>
    <h5>CRUD: Medicamentos -> Registro</h5>
    <hr><br>

    <form action="{{ route('medicamentos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Campo para el nombre del medicamento -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Medicamento</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <!-- Campo para la dosis -->
        <div class="mb-3">
            <label for="dosis" class="form-label">Dosis Recomendada</label>
            <input type="text" class="form-control" id="dosis" name="dosis" required>
        </div>

        <!-- Campo para la unidad -->
        <div class="mb-3">
            <label for="unidad" class="form-label">Unidad de Medida</label>
            <input type="text" class="form-control" id="unidad" name="unidad" required>
        </div>

        <!-- Campo para la cantidad -->
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad Disponible</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" required>
        </div>

        <!-- Campo para la descripción -->
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción (opcional)</label>
            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
        </div>

        <!-- Campo para la fecha de vencimiento -->
        <div class="mb-3">
            <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento</label>
            <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" required>
        </div>

        <hr>

        <!-- Botones de acción -->
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('medicamentos.index') }}" class="btn btn-danger">Cancelar</a>
    </form>

    <br><br>
</div>
@endsection
