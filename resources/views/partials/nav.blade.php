<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('inicio') }}">Pagina de inicio<span class="sr-only">(current)</span></a>
    <a class="navbar-brand" href="{{ route('posts.index') }}">Listado de Posts</a>
    @if (auth()->check())
    <a class="navbar-brand" href="{{ route('posts.create') }}">Nuevo post</a>
    @endif
    @if (auth()->guest())
        <a class="navbar-brand" href="{{ route('login') }}">Log In</a>
    @endif
    @if (auth()->check())
        <a class="navbar-brand" href="{{ route('logout') }}">Logout</a>
    @endif
</nav>
