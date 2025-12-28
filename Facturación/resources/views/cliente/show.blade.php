@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Detalles del Cliente</h1>

    <p><strong>Documento:</strong> {{ $cliente->Documento }}</p>
    <p><strong>Nombres:</strong> {{ $cliente->Nombres }}</p>
    <p><strong>Apellidos:</strong> {{ $cliente->Apellidos }}</p>
    <p><strong>Dirección:</strong> {{ $cliente->Direccion }}</p>
    <p><strong>Ciudad:</strong> {{ $cliente->ciudad->nombre_ciudad ?? '---' }}</p>
    <p><strong>Teléfono:</strong> {{ $cliente->Telefono }}</p>

    <a href="{{ route('cliente.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
