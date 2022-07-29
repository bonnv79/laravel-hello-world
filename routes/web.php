<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;

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

// Route::get(config('constants.ROUTER_PATH.HOME'), function () {
//     $posts = DB::table('posts')->select('id','title','description')->orderBy('id', 'DESC')->get();
//     // Debugbar::info($posts);
//     $search = '';
//     return view('home', compact('posts', 'search'));
// });

// Route::get('/welcome', function () {
//     return view('welcome', ['name' => 'Welcome Page']);
// });

// Route::get('/posts/list/{page}/{pageSize}', [App\Http\Controllers\Api\PostController::class, 'list']);

// Route::get('/posts/list', [App\Http\Controllers\Api\PostController::class, 'list']);

Route::get(config('constants.ROUTER_PATH.HOME'), [App\Http\Controllers\Api\PostController::class, 'search']);

Route::get(config('constants.ROUTER_PATH.POSTS.ADD'), [App\Http\Controllers\Api\PostController::class, 'create']);

Route::post(config('constants.ROUTER_PATH.POSTS.ADD'), [App\Http\Controllers\Api\PostController::class, 'store']);

Route::get(config('constants.ROUTER_PATH.POSTS.REMOVE').'/{id}', [App\Http\Controllers\Api\PostController::class, 'delete']);

Route::get(config('constants.ROUTER_PATH.POSTS.EDIT').'/{id}', [App\Http\Controllers\Api\PostController::class, 'edit']);

Route::post(config('constants.ROUTER_PATH.POSTS.EDIT').'/{id}', [App\Http\Controllers\Api\PostController::class, 'update']);

Route::get(config('constants.ROUTER_PATH.POSTS.VIEW').'/{id}', [App\Http\Controllers\Api\PostController::class, 'view']);

Route::get(config('constants.ROUTER_PATH.POSTS.LIST'), [App\Http\Controllers\Api\PostController::class, 'filter']);

Route::get('/api/list', [App\Http\Controllers\Api\PostController::class, 'apiList']);

//For adding an image
Route::get('/add-image', [ImageUploadController::class,'addImage'])->name('images.add');

//For storing an image
Route::post('/store-image', [ImageUploadController::class,'storeImage'])->name('images.store');

//For showing an image
Route::get('/view-image', [ImageUploadController::class,'viewImage'])->name('images.view');