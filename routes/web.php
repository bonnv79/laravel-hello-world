<?php

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
    $posts = DB::table('posts')->select('id','title','description')->get();
    // Debugbar::info($posts);
    return view('home', ['posts' => $posts]);
});

Route::get('/welcome', function () {
    return view('welcome', ['name' => 'Welcome Page']);
});

Route::get('/posts/create', [App\Http\Controllers\Api\PostController::class, 'create']);

Route::post('/posts/create', [App\Http\Controllers\Api\PostController::class, 'store']);

Route::get('/posts/delete/{id}', [App\Http\Controllers\Api\PostController::class, 'delete']);

Route::get('/posts/update/{id}', [App\Http\Controllers\Api\PostController::class, 'edit']);

Route::post('/posts/update/{id}', [App\Http\Controllers\Api\PostController::class, 'update']);

Route::get('/posts/view/{id}', [App\Http\Controllers\Api\PostController::class, 'view']);

Route::get('/posts', [App\Http\Controllers\Api\PostController::class, 'search']);