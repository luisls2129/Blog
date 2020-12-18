<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $post = new Posts();
        $post->titulo = "Titulo" . rand();
        $post->contenido = "Contenido" . rand();
        $post->save();
        return view('posts.index');
        //Posts::create($post->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->route('inicio');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Posts::findOrFail($id)->delete();
        return redirect()->route('posts.index');
    }

    public function nuevoPrueba()
    {
        $post = new Posts();
        $post->titulo = "Titulo" . rand();
        $post->contenido = "Contenido" . rand();
        $post->save();

        return redirect()->route('posts.index');
    }

    public function editarPrueba($id){

        $postModificar = Posts::findOrFail($id);
        $postModificar->titulo = "Titulo" . rand();
        $postModificar->contenido = "Contenido" . rand();
        $postModificar->save();
        return self::index();
    }
}
