@extends('plantilla')

@section('titulo', 'Ficha de post')

@section('contenido')

    <h3>{{$post['titulo']}}</h3>
    <p>{{$post['contenido']}}</p>
    <p>fecha de creacion {{$post['created_at']}}</p>

    <form action="{{ route('posts.destroy', $post) }}" method="POST">
        @method('DELETE')
        @csrf
        <button>Borrar</button>
    </form>
@endsection
