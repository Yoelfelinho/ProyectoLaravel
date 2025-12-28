<?php

namespace App\Http\Controllers;

use App\Models\Devolucion;
use App\Models\DetalleFactura;
use Illuminate\Http\Request;

class DevolucionController extends Controller
{
    public function index()
    {
        $devoluciones = Devolucion::with('detalle')->get();
        return view('devoluciones.index', compact('devoluciones'));
    }

    public function create()
    {
        $detalles = DetalleFactura::all();
        return view('devoluciones.create', compact('detalles'));
    }

    public function store(Request $request)
    {
        Devolucion::create($request->all());
        return redirect()->route('devoluciones.index')->with('success', 'Devolución registrada');
    }
}
