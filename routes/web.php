<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/qui-sommes-nous', [AboutController::class, 'index'])->name('about');

Route::get('/prestations', [PostController::class, 'prestations'])->name('prestations');

Route::get('/prestation/{id}', [PostController::class, 'single'])->name('post');

Route::middleware('auth')->group(function () {
  //  About
  Route::get('/about/{id}', [AboutController::class, 'edit'])->name('about.edit');
  Route::post('/about/{id}', [AboutController::class, 'update'])->name('about.update');

  //  Prestations
  Route::get('/posts', [PostController::class, 'index'])->name('posts');
  Route::post('/posts', [PostController::class, 'store']);
  Route::get('/posts/{id}', [PostController::class, 'edit'])->name('posts.edit');
  Route::post('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
  Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

  //  Médias
  Route::get('/upload', [FileController::class, 'index'])->name('file')->middleware('auth');
  Route::post('/upload', [FileController::class, 'store']);
  Route::delete('/upload/{file}', [FileController::class, 'destroy'])->name('upload.destroy');

  //  Contacts
  Route::get('/contact', [ContactController::class, 'index'])->name('contact')->middleware('auth');
  Route::delete('/contact/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');
});

Route::get('/realisations', [FileController::class, 'show'])->name('realisations');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/connexion9698', [RegisterController::class, 'index'])->name('register');
Route::post('/connexion9698', [RegisterController::class, 'store']);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/', [HomeController::class, 'store']);

Route::fallback([HomeController::class, 'index']);
