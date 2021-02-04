<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/app.css">

        <script src="js/app.js" type="text/javascript"></script>
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
