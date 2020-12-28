@extends('plantilla')

@section('titulo', 'Ficha de post')

@section('contenido')

    <h3>{{$post['titulo']}}</h3>
    <p>{{$post['contenido']}}</p>
    <p>Escrito por {{$usuario->login}} el {{$post['created_at']}}</p>

    <a class="text-decoration-none btn btn-light ml-5 text-primary font-weight-bold r-0" href="{{route('posts.edit', $post)}}">
        Editar
    </a>
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger" value="Borrar Post" />
    </form>


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
