@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Artículos con Stock Bajo</h1>

    <table class="table table-bordered">
        <tr>
            <th>Código</th>
            <th>Artículo</th>
            <th>Stock</th>
        </tr>

        @forelse($articulos as $a)
        <tr>
            <td>{{ $a->cod_articulo }}</td>
            <td>{{ $a->nombre }}</td>
            <td class="text-danger">{{ $a->stock }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center">Sin alertas de stock</td>
        </tr>
        @endforelse
    </table>

</div>
@endsection
