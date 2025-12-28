@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Registrar Proveedor</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('proveedores.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>No Documento</label>
            <input type="text" name="No_documento" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tipo Documento</label>
            <select name="cod_tipo_documento" class="form-control" required>
                <option value="">Seleccione...</option>
                @foreach($tipos as $t)
                    <option value="{{ $t->id_tipo_documento }}">{{ $t->Descripcion }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="Nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Apellido</label>
            <input type="text" name="Apellido" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nombre Comercial</label>
            <input type="text" name="nombre_comercial" class="form-control">
        </div>

        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control">
        </div>

        <div class="mb-3">
            <label>Ciudad</label>
            <select name="cod_ciudad" class="form-control" required>
                <option value="">Seleccione...</option>
                @foreach($ciudades as $c)
                    <option value="{{ $c->Codigo_ciudad }}">{{ $c->nombre_ciudad }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="Telefono" class="form-control">
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
