<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $roles = Rol::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:roles,nombre',
            'descripcion' => 'nullable|string|max:255',
        ]);

        Rol::create($request->all());
        return redirect()->route('roles.index')->with('success', 'Rol creado correctamente.');
    }

    public function show($id)
    {
        $rol = Rol::findOrFail($id);
        return view('roles.show', compact('rol'));
    }

    public function edit($id)
    {
        $rol = Rol::findOrFail($id);
        return view('roles.edit', compact('rol'));
    }

    public function update(Request $request, $id)
    {
        $rol = Rol::findOrFail($id);

        $request->validate([
            'nombre' => 'required|unique:roles,nombre,'.$id,
            'descripcion' => 'nullable|string|max:255',
        ]);

        $rol->update($request->all());
        return redirect()->route('roles.index')->with('success', 'Rol actualizado.');
    }

    public function destroy($id)
    {
        Rol::findOrFail($id)->delete();
        return redirect()->route('roles.index')->with('success', 'Rol eliminado.');
    }
}
