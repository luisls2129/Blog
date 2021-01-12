<?php

namespace App\Http\Middleware;

use App\Models\Posts;
use Closure;
use Illuminate\Http\Request;

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
        var_dump($request);
        if (auth()->user()->rol === $rol || auth()->user()->login === $post->login)
            return $next($request);
        else
            return redirect()->route('inicio');
    }
}
