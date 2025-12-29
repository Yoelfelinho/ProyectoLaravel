<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Ciudad;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Listar clientes
    public function index()
    {
        // Traemos todos los clientes con su ciudad y tipo de documento
        $clientes = Cliente::with(['ciudad', 'tipoDocumento'])->get();
        return view('cliente.index', compact('clientes'));
    }

    // Mostrar formulario para crear cliente
    public function create()
    {
        $ciudades = Ciudad::all();
        $tiposDocumento = TipoDocumento::all();
        return view('cliente.create', compact('ciudades', 'tiposDocumento'));
    }

    // Guardar cliente
    public function store(Request $request)
    {
        $request->validate([
            'documento'          => 'required|unique:cliente,documento',
            'cod_tipo_documento' => 'required|integer|exists:tipo_de_documento,id_tipo_documento',
            'nombres'            => 'required|string|max:100',
            'apellidos'          => 'required|string|max:100',
            'direccion'          => 'required|string|max:255',
            'cod_ciudad'         => 'required|exists:ciudad,codigo_ciudad',
            'telefono'           => 'required|string|max:20',
        ]);

        Cliente::create($request->only([
            'documento', 'cod_tipo_documento', 'nombres', 'apellidos', 'direccion', 'cod_ciudad', 'telefono'
        ]));

        return redirect()->route('cliente.index')
                         ->with('success', 'Cliente registrado correctamente.');
    }

    // Ver cliente (detalle)
    public function show(Cliente $cliente)
    {
        $cliente->load(['ciudad', 'tipoDocumento']);
        return view('cliente.show', compact('cliente'));
    }

    // Mostrar formulario para editar cliente
    public function edit(Cliente $cliente)
    {
        $ciudades = Ciudad::all();
        $tiposDocumento = TipoDocumento::all();
        return view('cliente.edit', compact('cliente', 'ciudades', 'tiposDocumento'));
    }

    // Actualizar cliente
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'cod_tipo_documento' => 'required|integer|exists:tipo_de_documento,id_tipo_documento',
            'nombres'            => 'required|string|max:100',
            'apellidos'          => 'required|string|max:100',
            'direccion'          => 'required|string|max:255',
            'cod_ciudad'         => 'required|exists:ciudad,codigo_ciudad',
            'telefono'           => 'required|string|max:20',
        ]);

        $cliente->update($request->only([
            'cod_tipo_documento', 'nombres', 'apellidos', 'direccion', 'cod_ciudad', 'telefono'
        ]));

        return redirect()->route('cliente.index')
                         ->with('success', 'Cliente actualizado correctamente.');
    }

    // Eliminar cliente
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('cliente.index')
                         ->with('success', 'Cliente eliminado correctamente.');
    }
}
