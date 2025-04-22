<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título - @yield('titulo')</title>
</head>
<body>
    @section('header')
        <h1>CABECERA DE LA WEB (master)</h1>
    @show

    <hr>

    <div class"container">
        @yield('content')
    </div>

    <hr>

    @section('footer')
        PIE DE PAGINA DE LA WEB (master)
    @show
</body>
</html>

