@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Factura</h2>

    <form action="{{ route('factura.update', $factura->Nnm_factura) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Código de Factura</label>
            <input type="text" class="form-control" value="{{ $factura->Nnm_factura }}" disabled>
        </div>

        <div class="mb-3">
            <label>Cliente</label>
            <select name="cod_cliente" class="form-control" required>
                @foreach($clientes as $cli)
                    <option value="{{ $cli->Documento }}"
                        {{ $factura->cod_cliente == $cli->Documento ? 'selected' : '' }}>
                        {{ $cli->Nombres }} {{ $cli->Apellidos }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Empleado</label>
            <input type="text" name="Nombre_empleado" class="form-control" value="{{ $factura->Nombre_empleado }}" required>
        </div>

        <div class="mb-3">
            <label>Fecha</label>
            <input type="date" name="Fecha_facturacion" class="form-control" value="{{ $factura->Fecha_facturacion }}" required>
        </div>

        <div class="mb-3">
            <label>Forma de Pago</label>
            <select name="id_formapago" class="form-control" required>
                @foreach($formas as $f)
                    <option value="{{ $f->id_formapago }}"
                        {{ $factura->id_formapago == $f->id_formapago ? 'selected' : '' }}>
                        {{ $f->Descripcion_formapago }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>IVA</label>
            <input type="number" name="iva" class="form-control" value="{{ $factura->iva }}" step="0.01" required>
        </div>

        <div class="mb-3">
            <label>Total</label>
            <input type="number" name="total_factura" class="form-control" value="{{ $factura->total_factura }}" step="0.01" required>
        </div>

        <button class="btn btn-warning">Actualizar</button>
        <a href="{{ route('factura.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

</div>
@endsection
