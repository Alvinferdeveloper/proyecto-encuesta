<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\encuestaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->intended('encuesta');
});

Route::get('/registro', [authController::class, 'registerPage']);
Route::post('/registerInsert', [authController::class, 'register']);

Route::get('/logOut', [authController::class, 'logOut']);

Route::post('/loginAction', [authController::class, 'login']);




Route::middleware('auth')->group(function () {
    Route::get('/encuesta', [encuestaController::class, 'encuestaPage']);
    Route::post('/procesarEncuesta', [encuestaController::class, 'procesarEncuesta']);
    Route::get('/dashboard', [encuestaController::class, 'dashboard']);
    Route::get('/pregunta/{id}', [encuestaController::class, 'preguntaEstadistica']);
    Route::get('/respuestaUsuario/{id}', [encuestaController::class, 'respuestaUsuario']);
   
});

require __DIR__.'/auth.php';
