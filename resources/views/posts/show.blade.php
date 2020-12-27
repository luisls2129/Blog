@extends('plantilla')

@section('titulo', 'Ficha de post')

@section('contenido')

    <h3>{{$post['titulo']}}</h3>
    <p>{{$post['contenido']}}</p>
    <p>Escrito por {{$usuario->login}} el {{$post['created_at']}}</p>

    <h2>Comentarios</h2>
    @forelse ($comentarios as $comentario)
        <li>{{$comentario->contenido}}</li>
        <?php
            $usuarioComentario = DB::table('usuarios')->where('id', $comentario->usuario_id)->first();
        ?>
        {{$usuarioComentario->login}}
    @empty
        <?>No hay comentarios</?>
    @endforelse
@endsection
