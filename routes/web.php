<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientItemController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PDFController;

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
    return view('home');
})->name('home');


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/users/{user:name}/posts', [UserPostController::class, 'index'])->name('users.posts');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


Route::post('/posts', [PostController::class, 'store']);

Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');





//Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
//Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');

//clients
Route::get('/clients', [ClientController::class, 'index'])->name('clients');
Route::post('/clients', [ClientController::class, 'store']);
Route::get('/clients/{client:name}/info', [ClientItemController::class, 'index'])->name('clients.info');



Route::get('pdf/preview', [ClientItemController::class, 'preview'])->name('pdf.preview');
Route::get('pdf/generate', [ClientItemController::class, 'generatePDF'])->name('pdf.generate');








