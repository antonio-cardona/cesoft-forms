<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\AdminController;

Auth::routes();

Route::view("/", "welcome");

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('home');

    Route::controller(UserDataController::class)->prefix("usuarios")->group(function () {
        Route::get('/perfil', 'perfil');

        Route::get('/mi-formulario', 'miFormulario');
    });

    Route::controller(AdminController::class)->prefix("admin")->group(function () {
        Route::get('/proyectos', 'proyectos');

        Route::get('/formularios', 'formularios');

        Route::get('/usuarios', 'usuarios');
    });
});
