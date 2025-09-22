<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Libro;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::with('libro')->get();
        return view('inventario.index', compact('inventarios'));
    }

    public function create()
    {
        $libros = Libro::all();
        return view('inventario.create', compact('libros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo_inventario' => 'required|unique:inventario,codigo_inventario',
            'id_libro' => 'required|exists:libro,id',
            'ubicacion' => 'required|string|max:90',
            'estado_disponibilidad' => 'required|string',
        ]);

        Inventario::create($request->all());
        return redirect()->route('inventario.index')->with('success', 'Registro agregado al inventario.');
    }

    public function show($id)
    {
        $inventario = Inventario::with('libro')->findOrFail($id);
        return view('inventario.show', compact('inventario'));
    }

    public function edit($id)
    {
        $inventario = Inventario::findOrFail($id);
        $libros = Libro::all();
        return view('inventario.edit', compact('inventario','libros'));
    }

    public function update(Request $request, $id)
    {
        $inventario = Inventario::findOrFail($id);

        $request->validate([
            'codigo_inventario' => 'required|unique:inventario,codigo_inventario,'.$id,
            'id_libro' => 'required|exists:libro,id',
            'ubicacion' => 'required|string|max:90',
            'estado_disponibilidad' => 'required|string',
        ]);

        $inventario->update($request->all());
        return redirect()->route('inventario.index')->with('success', 'Registro actualizado.');
    }

    public function destroy($id)
    {
        Inventario::findOrFail($id)->delete();
        return redirect()->route('inventario.index')->with('success', 'Registro eliminado.');
    }
}
