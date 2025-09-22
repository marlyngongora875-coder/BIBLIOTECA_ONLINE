<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        // Aquí podrías traer datos si quieres (ejemplo: últimos libros)
        $mensaje = "Bienvenido a la Biblioteca con Laravel";
        return view('index', compact('mensaje'));
    }
}
