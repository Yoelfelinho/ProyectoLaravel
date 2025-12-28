@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Listado de Artículos</h1>

    <a href="{{ route('articulo.create') }}" class="btn btn-primary mb-3">
        Nuevo Artículo
    </a>

    <div class="card">
        <div class="card-header">Artículos Registrados</div>
        <div class="card-body">
            @if($articulos->isEmpty())
                <p>No hay artículos registrados.</p>
            @else
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Precio Venta</th>
                            <th>Precio Costo</th>
                            <th>Stock</th>
                            <th>Tipo</th>
                            <th>Proveedor</th>
                            <th>Fecha Ingreso</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articulos as $articulo)
                        <tr>
                            <td>{{ $articulo->id_articulo }}</td>
                            <td>{{ $articulo->descripcion }}</td>
                            <td>{{ $articulo->precio_venta }}</td>
                            <td>{{ $articulo->precio_costo }}</td>
                            <td>{{ $articulo->stock }}</td>
                            <td>{{ optional($articulo->tipo)->descripcion_articulo ?? 'Sin tipo' }}</td>
                            <td>{{ optional($articulo->proveedor)->Nombre ?? 'Sin proveedor' }}</td>
                            <td>{{ $articulo->fecha_ingreso }}</td>
                            <td class="d-flex gap-1">
                                <a href="{{ route('articulo.show', $articulo->id_articulo) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('articulo.edit', $articulo->id_articulo) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('articulo.destroy', $articulo->id_articulo) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de borrar este artículo?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
