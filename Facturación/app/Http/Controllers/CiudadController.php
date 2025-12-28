<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function index()
    {
        $ciudades = Ciudad::all();
        return view('ciudades.index', compact('ciudades'));
    }

    public function create()
    {
        return view('ciudades.create');
    }

    public function store(Request $request)
    {
        Ciudad::create($request->all());
        return redirect()->route('ciudades.index')->with('success', 'Ciudad agregada');
    }

    public function edit(Ciudad $ciudad)
    {
        return view('ciudades.edit', compact('ciudad'));
    }

    public function update(Request $request, Ciudad $ciudad)
    {
        $ciudad->update($request->all());
        return redirect()->route('ciudades.index')->with('success', 'Ciudad actualizada');
    }

    public function destroy(Ciudad $ciudad)
    {
        $ciudad->delete();
        return back()->with('success', 'Ciudad eliminada');
    }
}
