@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="mb-4">Información del Proveedor</h1>

    <table class="table table-bordered">
        <tr>
            <th>No Documento</th>
            <td>{{ $proveedor->No_documento }}</td>
        </tr>

        <tr>
            <th>Nombre</th>
            <td>{{ $proveedor->Nombre }}</td>
        </tr>

        <tr>
            <th>Apellido</th>
            <td>{{ $proveedor->Apellido }}</td>
        </tr>

        <tr>
            <th>Nombre Comercial</th>
            <td>{{ $proveedor->nombre_comercial }}</td>
        </tr>

        <tr>
            <th>Dirección</th>
            <td>{{ $proveedor->direccion }}</td>
        </tr>

        <tr>
            <th>Ciudad</th>
            <td>{{ optional($proveedor->ciudad)->nombre_ciudad ?? 'No asignada' }}</td>
        </tr>

        <tr>
            <th>Teléfono</th>
            <td>{{ $proveedor->Telefono }}</td>
        </tr>
    </table>

    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">
        Volver
    </a>

</div>
@endsection
