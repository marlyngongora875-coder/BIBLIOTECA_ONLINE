<?php

namespace App\Http\Controllers;

use App\Models\Donacion;
use Illuminate\Http\Request;

class DonacionController extends Controller
{
    public function index()
    {
        $donaciones = Donacion::all();
        return view('donaciones.index', compact('donaciones'));
    }

    public function create()
    {
        return view('donaciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'tipo_donaciones' => 'required|string',
            'cantidad' => 'required|integer|min:1',
            'proveedor' => 'required|string|max:255',
        ]);

        Donacion::create($request->all());
        return redirect()->route('donaciones.index')->with('success', 'Donación registrada.');
    }

    public function show($id)
    {
        $donacion = Donacion::findOrFail($id);
        return view('donaciones.show', compact('donacion'));
    }

    public function edit($id)
    {
        $donacion = Donacion::findOrFail($id);
        return view('donaciones.edit', compact('donacion'));
    }

    public function update(Request $request, $id)
    {
        $donacion = Donacion::findOrFail($id);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'tipo_donaciones' => 'required|string',
            'cantidad' => 'required|integer|min:1',
            'proveedor' => 'required|string|max:255',
        ]);

        $donacion->update($request->all());
        return redirect()->route('donaciones.index')->with('success', 'Donación actualizada.');
    }

    public function destroy($id)
    {
        Donacion::findOrFail($id)->delete();
        return redirect()->route('donaciones.index')->with('success', 'Donación eliminada.');
    }
}
