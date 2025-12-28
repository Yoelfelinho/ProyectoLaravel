<?php

namespace App\Http\Controllers;

use App\Models\TipoArticulo;
use Illuminate\Http\Request;

class TipoArticuloController extends Controller
{
    public function index()
    {
        $tipos = TipoArticulo::all();
        return view('tipos_articulo.index', compact('tipos'));
    }

    public function store(Request $request)
    {
        TipoArticulo::create($request->all());
        return back()->with('success', 'Tipo de artículo registrado');
    }
}
