@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Proveedor</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('proveedores.update', $proveedor->No_documento) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>No Documento</label>
            <input type="text" class="form-control" value="{{ $proveedor->No_documento }}" disabled>
        </div>

        <div class="mb-3">
            <label>Tipo Documento</label>
            <select name="cod_tipo_documento" class="form-control" required>
                @foreach($tipos as $t)
                    <option value="{{ $t->id_tipo_documento }}" {{ $proveedor->cod_tipo_documento == $t->id_tipo_documento ? 'selected' : '' }}>
                        {{ $t->Descripcion }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="Nombre" class="form-control" value="{{ $proveedor->Nombre }}" required>
        </div>

        <div class="mb-3">
            <label>Apellido</label>
            <input type="text" name="Apellido" class="form-control" value="{{ $proveedor->Apellido }}" required>
        </div>

        <div class="mb-3">
            <label>Nombre Comercial</label>
            <input type="text" name="nombre_comercial" class="form-control" value="{{ $proveedor->nombre_comercial }}">
        </div>

        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ $proveedor->direccion }}">
        </div>

        <div class="mb-3">
            <label>Ciudad</label>
            <select name="cod_ciudad" class="form-control" required>
                @foreach($ciudades as $c)
                    <option value="{{ $c->Codigo_ciudad }}" {{ $proveedor->cod_ciudad == $c->Codigo_ciudad ? 'selected' : '' }}>
                        {{ $c->nombre_ciudad }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="Telefono" class="form-control" value="{{ $proveedor->Telefono }}">
        </div>

        <button class="btn btn-success">Actualizar</button>
        <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
