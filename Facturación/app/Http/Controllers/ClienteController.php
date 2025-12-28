<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Ciudad;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Listar clientes
    public function index()
    {
        $clientes = Cliente::with('ciudad')->get();
        return view('cliente.index', compact('clientes'));
    }

    // Formulario create
    public function create()
    {
        $ciudades = Ciudad::all();
        return view('cliente.create', compact('ciudades'));
    }

    // Guardar cliente
    public function store(Request $request)
    {
        $request->validate([
            'documento'          => 'required|unique:cliente,documento',
            'cod_tipo_documento' => 'required|integer|in:1,2,3', // ← validar como INT
            'nombres'            => 'required',
            'apellidos'          => 'required',
            'direccion'          => 'required',
            'cod_ciudad'         => 'required|exists:ciudad,codigo_ciudad',
            'telefono'           => 'required',
        ]);

        Cliente::create([
            'documento'          => $request->documento,
            'cod_tipo_documento' => $request->cod_tipo_documento,
            'nombres'            => $request->nombres,
            'apellidos'          => $request->apellidos,
            'direccion'          => $request->direccion,
            'cod_ciudad'         => $request->cod_ciudad,
            'telefono'           => $request->telefono,
        ]);

        return redirect()->route('cliente.index')
                         ->with('success', 'Cliente registrado correctamente.');
    }

    // Ver cliente
    public function show($documento)
    {
        $cliente = Cliente::with('ciudad')->findOrFail($documento);
        return view('cliente.show', compact('cliente'));
    }

    // Formulario edit
    public function edit($documento)
    {
        $cliente  = Cliente::findOrFail($documento);
        $ciudades = Ciudad::all();
        return view('cliente.edit', compact('cliente', 'ciudades'));
    }

    // Actualizar cliente
    public function update(Request $request, $documento)
    {
        $request->validate([
            'cod_tipo_documento' => 'required|integer|in:1,2,3', // ← validar como INT
            'nombres'            => 'required',
            'apellidos'          => 'required',
            'direccion'          => 'required',
            'cod_ciudad'         => 'required|exists:ciudad,codigo_ciudad',
            'telefono'           => 'required',
        ]);

        $cliente = Cliente::findOrFail($documento);

        $cliente->update([
            'cod_tipo_documento' => $request->cod_tipo_documento,
            'nombres'            => $request->nombres,
            'apellidos'          => $request->apellidos,
            'direccion'          => $request->direccion,
            'cod_ciudad'         => $request->cod_ciudad,
            'telefono'           => $request->telefono,
        ]);

        return redirect()->route('cliente.index')
                         ->with('success', 'Cliente actualizado correctamente.');
    }

    // Eliminar cliente
    public function destroy($documento)
    {
        Cliente::destroy($documento);
        return redirect()->route('cliente.index')
                         ->with('success', 'Cliente eliminado correctamente.');
    }
}
