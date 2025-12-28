<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Cliente;
use App\Models\FormaDePago;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    // Listar facturas
    public function index()
    {
        $facturas = Factura::with(['cliente', 'formaPago'])->get();
        return view('factura.index', compact('facturas'));
    }

    // Formulario create
    public function create()
    {
        $clientes = Cliente::all();
        $formas   = FormaDePago::all();
        return view('factura.create', compact('clientes', 'formas'));
    }

    // Guardar factura
    public function store(Request $request)
    {
        $request->validate([
            'num_factura'       => 'required|unique:factura,num_factura',
            'cod_cliente'       => 'nullable|exists:cliente,documento',
            'nombre_empleado'   => 'required',
            'fecha_facturacion' => 'required|date',
            'cod_formapago'     => 'required|exists:forma_de_pago,id_formapago',
            'total_factura'     => 'required|numeric',
            'iva'               => 'required|numeric',
        ]);

        Factura::create([
            'num_factura'       => $request->num_factura,
            'cod_cliente'       => $request->cod_cliente,
            'nombre_empleado'   => $request->nombre_empleado,
            'fecha_facturacion' => $request->fecha_facturacion,
            'cod_formapago'     => $request->cod_formapago,
            'total_factura'     => $request->total_factura,
            'iva'               => $request->iva,
        ]);

        return redirect()->route('factura.index')
                         ->with('success', 'Factura registrada correctamente.');
    }

    // Mostrar factura
    public function show($num_factura)
    {
        $factura = Factura::with(['cliente', 'formaPago'])->findOrFail($num_factura);
        return view('factura.show', compact('factura'));
    }

    // Formulario edit
    public function edit($num_factura)
    {
        $factura  = Factura::findOrFail($num_factura);
        $clientes = Cliente::all();
        $formas   = FormaDePago::all();
        return view('factura.edit', compact('factura', 'clientes', 'formas'));
    }

    // Actualizar factura
    public function update(Request $request, $num_factura)
    {
        $request->validate([
            'cod_cliente'       => 'nullable|exists:cliente,documento',
            'nombre_empleado'   => 'required',
            'fecha_facturacion' => 'required|date',
            'cod_formapago'     => 'required|exists:forma_de_pago,id_formapago',
            'total_factura'     => 'required|numeric',
            'iva'               => 'required|numeric',
        ]);

        $factura = Factura::findOrFail($num_factura);

        $factura->update([
            'cod_cliente'       => $request->cod_cliente,
            'nombre_empleado'   => $request->nombre_empleado,
            'fecha_facturacion' => $request->fecha_facturacion,
            'cod_formapago'     => $request->cod_formapago,
            'total_factura'     => $request->total_factura,
            'iva'               => $request->iva,
        ]);

        return redirect()->route('factura.index')
                         ->with('success', 'Factura actualizada correctamente.');
    }

    // Eliminar factura
    public function destroy($num_factura)
    {
        Factura::destroy($num_factura);
        return redirect()->route('factura.index')
                         ->with('success', 'Factura eliminada correctamente.');
    }
}
