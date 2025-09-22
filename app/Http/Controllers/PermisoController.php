<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    public function index()
    {
        $permisos = Permiso::all();
        return view('permisos.index', compact('permisos'));
    }

    public function create()
    {
        return view('permisos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:permisos,nombre',
            'tipo' => 'required|integer',
        ]);

        Permiso::create($request->all());
        return redirect()->route('permisos.index')->with('success', 'Permiso creado correctamente.');
    }

    public function show($id)
    {
        $permiso = Permiso::findOrFail($id);
        return view('permisos.show', compact('permiso'));
    }

    public function edit($id)
    {
        $permiso = Permiso::findOrFail($id);
        return view('permisos.edit', compact('permiso'));
    }

    public function update(Request $request, $id)
    {
        $permiso = Permiso::findOrFail($id);

        $request->validate([
            'nombre' => 'required|unique:permisos,nombre,'.$id,
            'tipo' => 'required|integer',
        ]);

        $permiso->update($request->all());
        return redirect()->route('permisos.index')->with('success', 'Permiso actualizado.');
    }

    public function destroy($id)
    {
        Permiso::findOrFail($id)->delete();
        return redirect()->route('permisos.index')->with('success', 'Permiso eliminado.');
    }
}
