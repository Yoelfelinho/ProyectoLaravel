@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-4">Nueva Factura</h2>

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

    <form action="{{ route('factura.store') }}" method="POST">
        @csrf

        {{-- N° Factura --}}
        <div class="mb-3">
            <label class="form-label">N° Factura</label>
            <input type="text" name="num_factura" class="form-control" value="{{ old('num_factura') }}" required>
        </div>

        {{-- Cliente --}}
        <div class="mb-3">
            <label class="form-label">Cliente</label>
            <select name="cod_cliente" class="form-control">
                <option value="">-- Cliente ocasional --</option>
                @foreach($clientes as $c)
                    <option value="{{ $c->documento }}" {{ old('cod_cliente') == $c->documento ? 'selected' : '' }}>
                        {{ $c->nombres }} {{ $c->apellidos }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Empleado --}}
        <div class="mb-3">
            <label class="form-label">Empleado</label>
            <input type="text" name="nombre_empleado" class="form-control" value="{{ old('nombre_empleado') }}" required>
        </div>

        {{-- Fecha Facturación --}}
        <div class="mb-3">
            <label class="form-label">Fecha de Facturación</label>
            <input type="date" name="fecha_facturacion" class="form-control" value="{{ old('fecha_facturacion') }}" required>
        </div>

        {{-- Forma de Pago --}}
        <div class="mb-3">
            <label class="form-label">Forma de Pago</label>
            <select name="cod_formapago" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($formas as $f)
                    <option value="{{ $f->id_formapago }}" {{ old('cod_formapago') == $f->id_formapago ? 'selected' : '' }}>
                        {{ $f->Descripcion_formapago }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Total --}}
        <div class="mb-3">
            <label class="form-label">Total</label>
            <input type="number" step="0.01" id="total" name="total_factura" class="form-control" value="{{ old('total_factura') }}" required>
        </div>

        {{-- IVA --}}
        <div class="mb-3">
            <label class="form-label">IVA (18%)</label>
            <input type="number" step="0.01" id="iva" name="iva" class="form-control" value="{{ old('iva') }}" readonly>
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('factura.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

{{-- CALCULO AUTOMÁTICO DE IVA --}}
<script>
    const total = document.getElementById('total');
    const iva = document.getElementById('iva');

    total.addEventListener('input', () => {
        iva.value = (total.value * 0.18).toFixed(2);
    });
</script>
@endsection
