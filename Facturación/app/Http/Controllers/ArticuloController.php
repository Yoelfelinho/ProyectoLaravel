<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\TipoArticulo;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    // Listar artículos
    public function index()
    {
        $articulos = Articulo::with(['tipo', 'proveedor'])->get();
        return view('articulo.index', compact('articulos'));
    }

    // Formulario create
    public function create()
    {
        $tipos = TipoArticulo::all();
        $proveedores = Proveedor::all();
        return view('articulo.create', compact('tipos', 'proveedores'));
    }

    // Guardar artículo
    public function store(Request $request)
    {
        $request->validate([
            'descripcion'       => 'required|string',
            'precio_venta'      => 'required|numeric',
            'precio_costo'      => 'required|numeric',
            'stock'             => 'required|integer',
            'cod_tipo_articulo' => 'required|exists:tipo_articulo,id_tipoarticulo',
            'cod_proveedor'     => 'nullable|exists:proveedor,No_documento',
            'fecha_ingreso'     => 'required|date',
        ]);

        Articulo::create($request->all());

        return redirect()->route('articulo.index')
                         ->with('success', 'Artículo registrado correctamente');
    }

    // Mostrar artículo
    public function show(Articulo $articulo)
    {
        return view('articulo.show', compact('articulo'));
    }

    // Formulario edit
    public function edit(Articulo $articulo)
    {
        $tipos = TipoArticulo::all();
        $proveedores = Proveedor::all();
        return view('articulo.edit', compact('articulo', 'tipos', 'proveedores'));
    }

    // Actualizar artículo
    public function update(Request $request, Articulo $articulo)
    {
        $request->validate([
            'descripcion'       => 'required|string',
            'precio_venta'      => 'required|numeric',
            'precio_costo'      => 'required|numeric',
            'stock'             => 'required|integer',
            'cod_tipo_articulo' => 'required|exists:tipo_articulo,id_tipoarticulo',
            'cod_proveedor'     => 'nullable|exists:proveedor,No_documento',
            'fecha_ingreso'     => 'required|date',
        ]);

        $articulo->update($request->all());

        return redirect()->route('articulo.index')
                         ->with('success', 'Artículo actualizado correctamente');
    }

    // Eliminar artículo
    public function destroy(Articulo $articulo)
    {
        $articulo->delete();
        return back()->with('success', 'Artículo eliminado correctamente');
    }
}
