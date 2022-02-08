<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtigoController;


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

Route::get('/', [HomeController::class, 'index']);

Route::get('/store/criar', [ArtigoController::class, 'cadastro'])->middleware('auth');
Route::get('/artigo/{id}', [ArtigoController::class, 'show']);
Route::post('/store', [ArtigoController::class, 'store'])->middleware('auth');
Route::delete('/artigo/{id}', [ArtigoController::class, 'destroy'])->middleware('auth');
Route::get('artigo/edit/{id}', [ArtigoController::class, 'edit'])->middleware('auth');
Route::put('artigo/edit/{id}', [ArtigoController::class, 'update'])->middleware('auth');
Route::get('/dashboard', [ArtigoController::class, 'dashboard'])->middleware('auth');
