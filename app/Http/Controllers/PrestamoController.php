<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Usuario;
use App\Models\Libro;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with(['usuario','libro'])->get();
        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        $libros = Libro::all();
        return view('prestamos.create', compact('usuarios','libros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id',
            'id_libro' => 'required|exists:libro,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date|after_or_equal:fecha_prestamo',
            'cantidad' => 'required|integer|min:1',
        ]);

        Prestamo::create($request->all());
        return redirect()->route('prestamos.index')->with('success', 'Préstamo registrado.');
    }

    public function show($id)
    {
        $prestamo = Prestamo::with(['usuario','libro'])->findOrFail($id);
        return view('prestamos.show', compact('prestamo'));
    }

    public function edit($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $usuarios = Usuario::all();
        $libros = Libro::all();
        return view('prestamos.edit', compact('prestamo','usuarios','libros'));
    }

    public function update(Request $request, $id)
    {
        $prestamo = Prestamo::findOrFail($id);

        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id',
            'id_libro' => 'required|exists:libro,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date|after_or_equal:fecha_prestamo',
            'cantidad' => 'required|integer|min:1',
        ]);

        $prestamo->update($request->all());
        return redirect()->route('prestamos.index')->with('success', 'Préstamo actualizado.');
    }

    public function destroy($id)
    {
        Prestamo::findOrFail($id)->delete();
        return redirect()->route('prestamos.index')->with('success', 'Préstamo eliminado.');
    }
}
