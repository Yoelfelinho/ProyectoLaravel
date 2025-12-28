@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">Clientes</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('cliente.create') }}" class="btn btn-primary mb-3">Nuevo Cliente</a>

    <div class="card">
        <div class="card-header">Listado de Clientes</div>
        <div class="card-body">
            @if($clientes->isEmpty())
                <p>No hay clientes registrados.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Documento</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Ciudad</th>
                            <th>Tipo Documento</th>
                            <th>Teléfono</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->documento }}</td>
                                <td>{{ $cliente->nombres }}</td>
                                <td>{{ $cliente->apellidos }}</td>
                                <td>{{ $cliente->ciudad->nombre_ciudad ?? '---' }}</td>
                                <td>
                                    @if($cliente->cod_tipo_documento == 1) DNI
                                    @elseif($cliente->cod_tipo_documento == 2) RUC
                                    @elseif($cliente->cod_tipo_documento == 3) Pasaporte
                                    @endif
                                </td>
                                <td>{{ $cliente->telefono }}</td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="{{ route('cliente.show', $cliente->documento) }}">Ver</a>
                                    <a class="btn btn-sm btn-warning" href="{{ route('cliente.edit', $cliente->documento) }}">Editar</a>
                                    <form action="{{ route('cliente.destroy', $cliente->documento) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar cliente?')">Borrar</button>
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
