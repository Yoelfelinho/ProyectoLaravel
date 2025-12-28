<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Ciudad;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    // Listar proveedores
    public function index()
    {
        $proveedores = Proveedor::with(['ciudad', 'tipodocumento'])->get();
        return view('proveedores.index', compact('proveedores'));
    }

    // Formulario crear
    public function create()
    {
        $ciudades = Ciudad::all();
        $tipos = TipoDocumento::all();
        return view('proveedores.create', compact('ciudades', 'tipos'));
    }

    // Guardar proveedor
    public function store(Request $request)
    {
        $request->validate([
            'No_documento' => 'required|unique:proveedor,No_documento',
            'Nombre' => 'required',
            'Apellido' => 'required',
            'cod_tipo_documento' => 'required|exists:tipo_documento,id_tipo_documento',
            'cod_ciudad' => 'required|exists:ciudad,Codigo_ciudad',
        ]);

        Proveedor::create($request->all());

        return redirect()->route('proveedores.index')
                         ->with('success', 'Proveedor agregado correctamente');
    }

    // Mostrar proveedor
    public function show(Proveedor $proveedor)
    {
        $proveedor->load(['ciudad', 'tipodocumento']);
        return view('proveedores.show', compact('proveedor'));
    }

    // Formulario editar
    public function edit(Proveedor $proveedor)
    {
        $ciudades = Ciudad::all();
        $tipos = TipoDocumento::all();
        return view('proveedores.edit', compact('proveedor', 'ciudades', 'tipos'));
    }

    // Actualizar proveedor
    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'Nombre' => 'required',
            'Apellido' => 'required',
            'cod_tipo_documento' => 'required|exists:tipo_documento,id_tipo_documento',
            'cod_ciudad' => 'required|exists:ciudad,Codigo_ciudad',
        ]);

        $proveedor->update($request->all());

        return redirect()->route('proveedores.index')
                         ->with('success', 'Proveedor actualizado correctamente');
    }

    // Eliminar proveedor
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedores.index')
                         ->with('success', 'Proveedor eliminado correctamente');
    }
}
