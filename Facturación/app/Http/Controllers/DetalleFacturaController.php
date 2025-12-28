<?php

namespace App\Http\Controllers;

use App\Models\DetalleFactura;
use App\Models\Factura;
use App\Models\Articulo;
use Illuminate\Http\Request;

class DetalleFacturaController extends Controller
{
    public function create()
    {
        $facturas = Factura::all();
        $articulos = Articulo::all();
        return view('detalle_facturas.create', compact('facturas', 'articulos'));
    }

    public function store(Request $request)
    {
        DetalleFactura::create($request->all());
        return back()->with('success', 'Detalle registrado');
    }
}
