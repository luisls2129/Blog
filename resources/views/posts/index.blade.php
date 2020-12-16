@extends('plantilla')

@section('titulo', 'Listado de posts')

@section('contenido')

@forelse ($posts as $post)
<p>
    {{$post["titulo"]}}
</p>

<button> <a href="{{route('posts.show', $post)}}">
    {{ $post["titulo"] }}
   </a>
</button>
@empty

@endforelse

@endsection
