<?php

use App\Http\Controllers\Api\PostController;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::get('posts/{id}',function($id){
    return Posts::find($id);
});*/

Route::apiResource('posts', PostController::class);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
