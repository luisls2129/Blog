<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <title>
        @yield('titulo')
        </title>
    </head>
    <body class="container">
        @include('partials.nav')
        {{fechaActual("d/m/Y")}}
        @yield('contenido')
    </body>
</html>
