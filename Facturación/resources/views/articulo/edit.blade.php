@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Artículo</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articulo.update', $articulo->id_articulo) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>ID</label>
            <input type="text" value="{{ $articulo->id_articulo }}" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <input type="text" name="descripcion" class="form-control" value="{{ $articulo->descripcion }}" required>
        </div>

        <div class="mb-3">
            <label>Precio Venta</label>
            <input type="number" step="0.01" name="precio_venta" class="form-control" value="{{ $articulo->precio_venta }}" required>
        </div>

        <div class="mb-3">
            <label>Precio Costo</label>
            <input type="number" step="0.01" name="precio_costo" class="form-control" value="{{ $articulo->precio_costo }}" required>
        </div>

        <div class="mb-3">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" value="{{ $articulo->stock }}" required>
        </div>

        <div class="mb-3">
            <label>Tipo de Artículo</label>
            <select name="cod_tipo_articulo" class="form-control" required>
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo->id_tipoarticulo }}" {{ $articulo->cod_tipo_articulo == $tipo->id_tipoarticulo ? 'selected' : '' }}>
                        {{ $tipo->descripcion_articulo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Proveedor (Opcional)</label>
            <select name="cod_proveedor" class="form-control">
                <option value="">-- Sin proveedor --</option>
                @foreach($proveedores as $prov)
                    <option value="{{ $prov->No_documento }}" {{ $articulo->cod_proveedor == $prov->No_documento ? 'selected' : '' }}>
                        {{ $prov->Nombre }} {{ $prov->Apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Fecha Ingreso</label>
            <input type="date" name="fecha_ingreso" class="form-control" value="{{ $articulo->fecha_ingreso }}" required>
        </div>

        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('articulo.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
