<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario' => 'required|unique:usuarios,usuario',
            'nombre' => 'required|string|max:50',
            'clave' => 'required|string|min:6',
        ]);

        Usuario::create([
            'usuario' => $request->usuario,
            'nombre' => $request->nombre,
            'clave' => Hash::make($request->clave),
            'estado' => 1,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado.');
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:50',
        ]);

        $usuario->update([
            'nombre' => $request->nombre,
            'clave' => $request->clave ? Hash::make($request->clave) : $usuario->clave,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado.');
    }

    public function destroy($id)
    {
        Usuario::findOrFail($id)->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado.');
    }
}
