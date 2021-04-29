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

use App\Http\Controllers\EventController;

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// Lista todos os eventos.
Route::get('/', [EventController::class, 'index']);

// Formulário de criação de eventos.
Route::get('/events/create', [EventController::class, 'create']);

// Lista um evento em específico.
Route::get('/events/{id}', [EventController::class, 'show']);

// Insere eventos no banco de dados.
Route::post('/events', [EventController::class, 'store']);