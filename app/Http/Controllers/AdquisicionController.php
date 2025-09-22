<?php

namespace App\Http\Controllers;

use App\Models\Adquisicion;
use Illuminate\Http\Request;

class AdquisicionController extends Controller
{
    public function index()
    {
        $adquisiciones = Adquisicion::all();
        return view('adquisiciones.index', compact('adquisiciones'));
    }

    public function create()
    {
        return view('adquisiciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'tipo_adquisicion' => 'required|string',
            'cantidad' => 'required|integer|min:1',
            'proveedor' => 'required|string|max:255',
            'precio_total' => 'nullable|numeric',
        ]);

        Adquisicion::create($request->all());
        return redirect()->route('adquisiciones.index')->with('success', 'Adquisición registrada.');
    }

    public function show($id)
    {
        $adquisicion = Adquisicion::findOrFail($id);
        return view('adquisiciones.show', compact('adquisicion'));
    }

    public function edit($id)
    {
        $adquisicion = Adquisicion::findOrFail($id);
        return view('adquisiciones.edit', compact('adquisicion'));
    }

    public function update(Request $request, $id)
    {
        $adquisicion = Adquisicion::findOrFail($id);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'tipo_adquisicion' => 'required|string',
            'cantidad' => 'required|integer|min:1',
            'proveedor' => 'required|string|max:255',
            'precio_total' => 'nullable|numeric',
        ]);

        $adquisicion->update($request->all());
        return redirect()->route('adquisiciones.index')->with('success', 'Adquisición actualizada.');
    }

    public function destroy($id)
    {
        Adquisicion::findOrFail($id)->delete();
        return redirect()->route('adquisiciones.index')->with('success', 'Adquisición eliminada.');
    }
}
