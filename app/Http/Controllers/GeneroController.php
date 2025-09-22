<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function index()
    {
        $generos = Genero::all();
        return view('generos.index', compact('generos'));
    }

    public function create()
    {
        return view('generos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'genero' => 'required|unique:genero,genero',
        ]);

        Genero::create($request->all());
        return redirect()->route('generos.index')->with('success', 'Género agregado.');
    }

    public function edit($id)
    {
        $genero = Genero::findOrFail($id);
        return view('generos.edit', compact('genero'));
    }

    public function update(Request $request, $id)
    {
        $genero = Genero::findOrFail($id);

        $request->validate([
            'genero' => 'required|unique:genero,genero,'.$id,
        ]);

        $genero->update($request->all());
        return redirect()->route('generos.index')->with('success', 'Género actualizado.');
    }

    public function destroy($id)
    {
        Genero::findOrFail($id)->delete();
        return redirect()->route('generos.index')->with('success', 'Género eliminado.');
    }
}
