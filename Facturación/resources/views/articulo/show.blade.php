@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="mb-4">Detalle del Artículo</h1>

    <div class="card">
        <div class="card-body">

            <p><strong>ID:</strong> {{ $articulo->id_articulo }}</p>
            <p><strong>Descripción:</strong> {{ $articulo->descripcion }}</p>
            <p><strong>Precio Venta:</strong> {{ $articulo->precio_venta }}</p>
            <p><strong>Precio Costo:</strong> {{ $articulo->precio_costo }}</p>
            <p><strong>Stock:</strong> {{ $articulo->stock }}</p>
            <p><strong>Tipo Artículo:</strong> {{ $articulo->cod_tipo_articulo }}</p>
            <p><strong>Proveedor:</strong> {{ $articulo->cod_proveedor }}</p>
            <p><strong>Fecha Ingreso:</strong> {{ $articulo->fecha_ingreso }}</p>

            <a href="{{ route('articulo.index') }}" class="btn btn-secondary">Volver</a>
            <a href="{{ route('articulo.edit', $articulo->id_articulo) }}" class="btn btn-warning">Editar</a>

        </div>
    </div>

</div>
@endsection
