<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModController;
use App\Http\Controllers\PartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::permanentRedirect('/home', '/');

Route::get('/', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::get('posts/{category:slug}/create', [PostController::class, 'create'])->middleware('can:moderate');
Route::post('posts/{category:slug}', [PostController::class,'store'])->middleware('can:moderate');
Route::get('posts/{post:slug}/edit', [PostController::class, 'create'])->middleware('can:moderate');
Route::get('posts/{post:slug}/edit', [PostController::class, 'create'])->middleware('can:moderate');

Route::post('posts/{post:slug}/comments', [CommentController::class, 'store'])->middleware('auth');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->middleware('auth');

Route::post('posts/{post:slug}/parts', [PartController::class,'store'])->middleware('can:moderate');

Route::get('parts/{part}/edit', [PartController::class,'edit'])->middleware('can:moderate');
Route::patch('parts/{part}', [PartController::class,'update'])->middleware('can:moderate');
Route::delete('parts/{part}', [PartController::class,'destroy'])->middleware('can:moderate');

Route::get('register/create', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login/create', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'login'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('moderator/posts', [ModController::class,'index'])->middleware('can:moderate');
Route::get('moderator/posts/{post}', [ModController::class,'edit'])->middleware('can:moderate');
Route::delete('posts/{post:slug}', [ModController::class, 'destroy'])->middleware('can:moderate');

Route::get('profile/edit', [UserController::class,'edit'])->middleware('auth');
Route::delete('profile/{user}', [UserController::class,'destroy'])->middleware('auth');
Route::patch('profile/{user}', [UserController::class,'update'])->middleware('auth');


