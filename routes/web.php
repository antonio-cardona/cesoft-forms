<?php

use App\Http\Controllers\UserDataController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProyectoController;
use Illuminate\Support\Facades\Route;

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

    // PROYECTOS:
    Route::controller(ProyectoController::class)->prefix("admin/proyectos")->group(function () {
        Route::get('/nuevo', 'nuevo');

        Route::get('/editar', 'editar');

        Route::get('/eliminar', 'eliminar');

        Route::post('/crear', 'crear')->name("crear-proyecto");
    });
});
