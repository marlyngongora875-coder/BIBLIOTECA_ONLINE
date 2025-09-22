<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Biblioteca</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
</head>
<body>
    <header>
        <h1>{{ $mensaje }}</h1>
        <nav>
            <ul>
                <li><a href="{{ route('inicio') }}">Inicio</a></li>
                <li><a href="/libros">Libros</a></li>
                <li><a href="/donaciones">Donaciones</a></li>
                <li><a href="/prestamos">Préstamos</a></li>
                <li><a href="/usuarios">Usuarios</a></li>
                <li><a href="/dashboard">Dashboard</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <p>Este es el inicio de la biblioteca. Aquí puedes navegar a las secciones principales.</p>
    </main>

    <script src="{{ asset('js/menu.js') }}"></script>
</body>
</html>
