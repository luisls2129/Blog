@extends('plantilla')

@section('titulo', 'Ficha de post')

@section('contenido')


<h1>Modificar Post</h1>


<form action="{{route('posts.update', $post->id) }}" method="GET">

    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="titulo">Título:</label>
        <input type="text" class="form-control" name="titulo" id="titulo" value="{{$post->titulo}}">
    </div>
    <div class="form-group">
        <label for="contenido">Contenido:</label>
        <input type="text" class="form-control" name="contenido" id="contenido"  value="{{$post->contenido}}">
    </div>

    <input type="submit" name="enviar" id="enviar" class="btn btn-dark btn-block">

</form>

@endsection
