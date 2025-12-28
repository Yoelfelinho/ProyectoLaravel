@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Factura {{ $factura->Nnm_factura }}</h2>

    <div class="card p-3">

        <p><strong>Cliente:</strong> 
            {{ $factura->cliente->Nombres }} {{ $factura->cliente->Apellidos }}
        </p>

        <p><strong>Empleado:</strong> 
            {{ $factura->Nombre_empleado }}
        </p>

        <p><strong>Fecha:</strong> 
            {{ $factura->Fecha_facturacion }}
        </p>

        <p><strong>Forma de Pago:</strong> 
            {{ $factura->formaPago->Descripcion_formapago }}
        </p>

        <p><strong>IVA:</strong> 
            {{ $factura->iva }} %
        </p>

        <p><strong>Total Factura:</strong> 
            S/ {{ number_format($factura->total_factura,2) }}
        </p>

    </div>

    <a href="{{ route('factura.index') }}" class="btn btn-secondary mt-3">Volver</a>

</div>
@endsection


