@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Registrar Cliente</h1>

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

    <form action="{{ route('cliente.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Documento</label>
            <input type="text" name="documento" class="form-control" value="{{ old('documento') }}" required>
        </div>

        <div class="mb-3">
            <label>Tipo Documento</label>
            <select name="cod_tipo_documento" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="1" {{ old('cod_tipo_documento') == 1 ? 'selected' : '' }}>DNI</option>
                <option value="2" {{ old('cod_tipo_documento') == 2 ? 'selected' : '' }}>RUC</option>
                <option value="3" {{ old('cod_tipo_documento') == 3 ? 'selected' : '' }}>Pasaporte</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Nombres</label>
            <input type="text" name="nombres" class="form-control" value="{{ old('nombres') }}" required>
        </div>

        <div class="mb-3">
            <label>Apellidos</label>
            <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos') }}" required>
        </div>

        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}" required>
        </div>

        <div class="mb-3">
            <label>Ciudad</label>
            <select name="cod_ciudad" class="form-control" required>
                <option value="">Seleccione una ciudad</option>
                @foreach($ciudades as $ciudad)
                    <option value="{{ $ciudad->codigo_ciudad }}" {{ old('cod_ciudad') == $ciudad->codigo_ciudad ? 'selected' : '' }}>
                        {{ $ciudad->nombre_ciudad }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}" required>
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('cliente.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
