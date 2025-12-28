@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="mb-4">Listado de Facturas</h1>

    {{-- Botón Crear --}}
    <a href="{{ route('factura.create') }}" class="btn btn-primary mb-3">
        Nueva Factura
    </a>

    {{-- Tabla --}}
    <div class="card">
        <div class="card-header">
            Facturas Registradas
        </div>

        <div class="card-body">
            @if($facturas->isEmpty())
                <p>No hay facturas registradas.</p>
            @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Número</th>
                        <th>Cliente</th>
                        <th>Empleado</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Opciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($facturas as $factura)
                        <tr>
                            <td>{{ $factura->num_factura }}</td>
                            <td>
                                @if($factura->cliente)
                                    {{ $factura->cliente->nombres }} {{ $factura->cliente->apellidos }}
                                @else
                                    Cliente ocasional
                                @endif
                            </td>
                            <td>{{ $factura->nombre_empleado }}</td>
                            <td>{{ $factura->fecha_facturacion }}</td>
                            <td>{{ $factura->total_factura }}</td>

                            <td>
                                {{-- Botón Editar --}}
                                <a href="{{ route('factura.edit', $factura->num_factura) }}"
                                   class="btn btn-sm btn-warning">
                                    Editar
                                </a>

                                {{-- Botón Eliminar --}}
                                <form action="{{ route('factura.destroy', $factura->num_factura) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Está seguro de borrar esta factura?')">
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
