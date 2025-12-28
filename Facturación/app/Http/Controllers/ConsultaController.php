<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;

class ConsultaController extends Controller
{
    public function ventasPorFecha(Request $request)
    {
        $ventas = collect();

        if ($request->filled(['inicio', 'fin'])) {
            $ventas = Factura::with(['cliente', 'detalles.articulo'])
                ->whereBetween('fecha_facturacion', [$request->inicio, $request->fin])
                ->get();
        }

        return view('consultas.ventas', compact('ventas'));
    }

    public function stockBajo()
    {
        $articulos = Articulo::where('stock', '<=', 5)->get();
        return view('consultas.stock', compact('articulos'));
    }
}
