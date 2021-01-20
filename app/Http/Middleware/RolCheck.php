<?php

namespace App\Http\Middleware;

use App\Models\Posts;
use Closure;
use Illuminate\Http\Request;
use Mockery\Undefined;

class RolCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $rol)
    {

        $post_id = $request->route()->parameters()['post'];
        $post = Posts::findOrFail($post_id);

        //dd($post_id);

        if (auth()->check() && (auth()->user()->rol === $rol || auth()->user()->id === $post->usuario_id))
            return $next($request);
        else
            return redirect()->route('login');
    }
}
