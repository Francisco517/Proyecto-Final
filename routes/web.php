<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

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

Route::get('/uniformes', function () {
    return view('pagina');
});

route::get('/descarga/{archivo}',[EventoController::class, 'descargaArchivo'])->name('descarga');

route::resource('evento',EventoController::class)->middleware('auth');

route::get('/evento/correo/{evento}',[EventoController::class, 'notificarEvento'])->name('evento.correo');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
