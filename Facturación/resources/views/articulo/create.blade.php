@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Registrar Artículo</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articulo.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Descripción</label>
            <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion') }}" required>
        </div>

        <div class="mb-3">
            <label>Precio Venta</label>
            <input type="number" step="0.01" name="precio_venta" class="form-control" value="{{ old('precio_venta') }}" required>
        </div>

        <div class="mb-3">
            <label>Precio Costo</label>
            <input type="number" step="0.01" name="precio_costo" class="form-control" value="{{ old('precio_costo') }}" required>
        </div>

        <div class="mb-3">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" value="{{ old('stock') }}" required>
        </div>

        <div class="mb-3">
            <label>Tipo de Artículo</label>
            <select name="cod_tipo_articulo" class="form-control" required>
                <option value="">Seleccione...</option>
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo->id_tipoarticulo }}" {{ old('cod_tipo_articulo') == $tipo->id_tipoarticulo ? 'selected' : '' }}>
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
                    <option value="{{ $prov->No_documento }}" {{ old('cod_proveedor') == $prov->No_documento ? 'selected' : '' }}>
                        {{ $prov->Nombre }} {{ $prov->Apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Fecha Ingreso</label>
            <input type="date" name="fecha_ingreso" class="form-control" value="{{ old('fecha_ingreso') }}" required>
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('articulo.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
