<?php

use App\Http\Controllers\FilmController;
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
    return view('welcome');
});

Route::get('/films', [FilmController::class, 'index']);

Route::post('/films/create', [FilmController::class, 'create'])->name('film.create');

Route::delete('/films/delete/{id}', [FilmController::class, 'delete'])->name('film.delete');

