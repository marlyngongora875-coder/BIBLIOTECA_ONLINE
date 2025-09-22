<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $libros = Libro::with(['autor','editorial','genero'])->get();
    return view('libros.index', compact('libros'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $autores = Autor::all();
    $editoriales = Editorial::all();
    $generos = Genero::all();
    return view('libros.create', compact('autores','editoriales','generos'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'titulo' => 'required|string|max:255',
        'id_autor' => 'required|exists:autor,id',
        'id_editorial' => 'nullable|exists:editorial,id',
        'id_genero' => 'nullable|exists:genero,id',
        'anio_edicion' => 'required|date',
        'cantidad' => 'required|integer|min:1',
    ]);

    Libro::create($request->all());

    return redirect()->route('libros.index')->with('success', 'Libro creado correctamente.');
}


    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $libro = Libro::with(['autor','editorial','genero'])->findOrFail($id);
    return view('libros.show', compact('libro'));
}


    /**
     * Show the form for editing the specified resource.
     */
   public function edit($id)
{
    $libro = Libro::findOrFail($id);
    $autores = Autor::all();
    $editoriales = Editorial::all();
    $generos = Genero::all();
    return view('libros.edit', compact('libro','autores','editoriales','generos'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $libro = Libro::findOrFail($id);

    $request->validate([
        'titulo' => 'required|string|max:255',
        'id_autor' => 'required|exists:autor,id',
        'id_editorial' => 'nullable|exists:editorial,id',
        'id_genero' => 'nullable|exists:genero,id',
        'anio_edicion' => 'required|date',
        'cantidad' => 'required|integer|min:1',
    ]);

    $libro->update($request->all());

    return redirect()->route('libros.index')->with('success', 'Libro actualizado.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $libro = Libro::findOrFail($id);
    $libro->delete();

    return redirect()->route('libros.index')->with('success', 'Libro eliminado.');
}

}
