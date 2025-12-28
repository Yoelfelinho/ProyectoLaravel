@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="mb-4">Listado de Proveedores</h1>

    {{-- Botón Crear --}}
    <a href="{{ route('proveedores.create') }}" class="btn btn-primary mb-3">
        Nuevo Proveedor
    </a>

    {{-- Tabla --}}
    <div class="card">
        <div class="card-header">
            Proveedores Registrados
        </div>

        <div class="card-body">
            @if($proveedores->isEmpty())
                <p>No hay proveedores registrados.</p>
            @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No Documento</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Nombre Comercial</th>
                        <th>Ciudad</th>
                        <th>Teléfono</th>
                        <th>Opciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($proveedores as $p)
                        <tr>
                            <td>{{ $p->No_documento }}</td>
                            <td>{{ $p->Nombre }}</td>
                            <td>{{ $p->Apellido }}</td>
                            <td>{{ $p->nombre_comercial }}</td>
                            <td>{{ optional($p->ciudad)->nombre_ciudad ?? 'Sin ciudad' }}</td>
                            <td>{{ $p->Telefono }}</td>
                            <td class="d-flex gap-1">

                                {{-- VER --}}
                                <a href="{{ route('proveedores.show', ['proveedor' => $p->No_documento]) }}" class="btn btn-info btn-sm">
                                    Ver
                                </a>

                                {{-- EDITAR --}}
                                <a href="{{ route('proveedores.edit', ['proveedor' => $p->No_documento]) }}" class="btn btn-warning btn-sm">
                                    Editar
                                </a>

                                {{-- ELIMINAR --}}
                                <form action="{{ route('proveedores.destroy', ['proveedor' => $p->No_documento]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Está seguro de borrar este proveedor?')">
                                        Eliminar
                                    </button>
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
