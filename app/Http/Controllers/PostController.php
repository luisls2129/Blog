<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\PostDec;
use Symfony\Component\VarDumper\VarDumper;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth'],
            ['except' => ['show', 'index','edit']]);

        $this->middleware(['roles:admin'],
            ['only' => ['edit', 'destroy']]);
    }

    public function index()
    {
        $posts = Posts::orderBy('titulo')
            ->paginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*return redirect()->route('inicio');*/
        /*$post = new Posts();
        $post->titulo = "Titulo" . rand();
        $post->contenido = "Contenido" . rand();
        $post->save();
        return view('posts.index');*/
        //Posts::create($post->all());

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Posts();
        $post->titulo = $request->get('titulo');
        $post->contenido = $request->get('contenido');
        $post->usuario_id = 1;
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Posts::findOrFail($id);

        $usuario = DB::table('usuarios')->where('id', $post->usuario_id)->first();
        $comentarios = DB::table('comentarios')->where('post_id', $id)->get();

        return view('posts.show', compact('post', 'usuario', 'comentarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*
        $postModificar = Posts::findOrFail($id);
        $postModificar->titulo = "Titulo" . rand();
        $postModificar->contenido = "Contenido" . rand();
        $postModificar->save();*/
        //return self::index();
        $post = Posts::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Posts::findOrFail($id);
        $post->titulo = $request->get('titulo');
        $post->contenido = $request->get('contenido');
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comentario::where('post_id', $id)->delete();
        Posts::findOrFail($id)->delete();
        return redirect()->route('posts.index');
    }

    public function nuevoPrueba()
    {
        $post = new Posts();
        $post->titulo = "Titulo" . rand();
        $post->contenido = "Contenido" . rand();
        $post->usuario_id = rand(1, 2);
        $post->save();

        return redirect()->route('posts.index');
    }

    public function editarPrueba($id)
    {

        $postModificar = Posts::findOrFail($id);
        $postModificar->titulo = "Titulo" . rand();
        $postModificar->contenido = "Contenido" . rand();
        $postModificar->save();
        return self::index();
    }
}
