<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('posts', 'App\Http\Controllers\PostController');
/*
Route::get('/posts/editarPrueba/{id}', 'App\Http\Controllers\PostController@editarPrueba');
Route::get('/posts/nuevoPrueba', 'App\Http\Controllers\PostController@nuevoPrueba');*/

//Pongo el namespace entero ya que sino dará error porque no encuentra el Controller



