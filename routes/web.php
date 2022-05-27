<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

/*posts routeee */
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/trashed', [PostController::class, 'postTrashed'])->name('posts.trashed');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/show/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
Route::get('/posts/destroy/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/hdelete/{id}', [PostController::class, 'hdelete'])->name('posts.hdelete');
Route::get('/posts/restor/{id}', [PostController::class, 'restor'])->name('posts.restor');




