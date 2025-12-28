@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Ventas por Fecha</h1>

    <form method="GET" action="{{ route('consultas.ventas') }}" class="row g-3 mb-3">
        <div class="col-md-4">
            <label>Fecha Inicio</label>
            <input type="date" name="inicio" class="form-control" required>
        </div>

        <div class="col-md-4">
            <label>Fecha Fin</label>
            <input type="date" name="fin" class="form-control" required>
        </div>

        <div class="col-md-4 align-self-end">
            <button class="btn btn-primary">Consultar</button>
        </div>
    </form>

    {{-- RESULTADOS --}}
    @if(isset($ventas) && $ventas->isNotEmpty())
        <div class="card">
            <div class="card-header">
                Resultados: {{ $ventas->count() }} venta(s)
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>N° Factura</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Detalles</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ventas as $v)
                        <tr>
                            <td>{{ $v->num_factura }}</td>
                            <td>{{ $v->cliente->Nombre ?? 'Sin cliente' }}</td>
                            <td>{{ $v->fecha_facturacion }}</td>
                            <td>{{ $v->total_factura }}</td>
                            <td>
                                <ul class="mb-0">
                                    @foreach($v->detalles as $d)
                                        <li>{{ $d->articulo->descripcion ?? 'Sin artículo' }} - Cant: {{ $d->cantidad }} - Subtotal: {{ $d->subtotal }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @elseif(isset($ventas))
        <p>No se encontraron ventas en el rango de fechas seleccionado.</p>
    @endif

</div>
@endsection
