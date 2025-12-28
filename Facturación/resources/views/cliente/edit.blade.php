@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Cliente</h1>

    {{-- ERRORES --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cliente.update', $cliente->documento) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Documento</label>
            <input type="text" class="form-control" value="{{ $cliente->documento }}" disabled>
        </div>

        <div class="mb-3">
            <label>Tipo Documento</label>
            <select name="cod_tipo_documento" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="1" {{ $cliente->cod_tipo_documento == 1 ? 'selected' : '' }}>DNI</option>
                <option value="2" {{ $cliente->cod_tipo_documento == 2 ? 'selected' : '' }}>RUC</option>
                <option value="3" {{ $cliente->cod_tipo_documento == 3 ? 'selected' : '' }}>Pasaporte</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Nombres</label>
            <input type="text" name="nombres" class="form-control" value="{{ $cliente->nombres }}" required>
        </div>

        <div class="mb-3">
            <label>Apellidos</label>
            <input type="text" name="apellidos" class="form-control" value="{{ $cliente->apellidos }}" required>
        </div>

        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ $cliente->direccion }}" required>
        </div>

        <div class="mb-3">
            <label>Ciudad</label>
            <select name="cod_ciudad" class="form-control" required>
                <option value="">Seleccione una ciudad</option>
                @foreach($ciudades as $ciudad)
                    <option value="{{ $ciudad->codigo_ciudad }}" {{ $cliente->cod_ciudad == $ciudad->codigo_ciudad ? 'selected' : '' }}>
                        {{ $ciudad->nombre_ciudad }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ $cliente->telefono }}" required>
        </div>

        <button class="btn btn-success">Actualizar</button>
        <a href="{{ route('cliente.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
