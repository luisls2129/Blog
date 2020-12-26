@extends('plantilla')

@section('titulo', 'Listado de posts')

@section('contenido')

@forelse ($posts as $post)

<div class="d-flex justify-content-left align-items-center mb-4">

        <div>
            {{$post["titulo"]}} ({{$post->usuario->login}})
        </div>

        <a class="text-decoration-none btn btn-light ml-5 text-primary font-weight-bold r-0" href="{{route('posts.show', $post)}}">

            Ver

        </a>
        <form action="{{ route('posts.destroy', $post) }}" method="POST">
            @method('DELETE')
            @csrf
            <button>Borrar</button>
        </form>
        <a class="text-decoration-none btn btn-light ml-5 text-primary font-weight-bold r-0" href="{{route('posts.edit', $post)}}">

            Editar

        </a>

</div>

@empty

@endforelse

{{ $posts->links() }}
@endsection
