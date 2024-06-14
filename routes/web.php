<?php

use App\Http\Controllers\AreaNivelSuperiorController;
use App\Http\Controllers\PreguntaSignificativaController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::view("/", "welcome");

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('home');

    Route::controller(UserDataController::class)->prefix("usuarios")
        ->group(function () {
            Route::get('/perfil', 'perfil');

            Route::get('/mi-formulario', 'miFormulario');
        });

    // PROYECTOS:
    Route::controller(ProyectoController::class)->prefix("admin/proyectos")
        ->group(function () {
            Route::get('/', 'proyectos');

            Route::get('/nuevo', 'nuevo');

            Route::get('/editar/{id}', 'editar')
                ->name("editar-proyecto");

            Route::get('/eliminar', 'eliminar');

            Route::post('/crear', 'crear')
                ->name("crear-proyecto");

            Route::post('/actualizar', 'actualizar')
                ->name("actualizar-proyecto");

            Route::get('/pre-publicar/{id}', 'prePublicar')
                ->name("pre-publicar-proyecto");

            Route::get('/publicar/{id}', 'publicar')
                ->name("publicar-proyecto");

            Route::get('/datos-clasificacion/{id}', 'datosClasificacion')
                ->name("datos-clasificacion-proyecto");
        });

    Route::controller(AreaNivelSuperiorController::class)->prefix("admin/areas")
        ->group(function () {
            Route::get('/{idProyecto}', 'areas')
                ->name("listar-areas");

            Route::post('/crear', 'crear')
                ->name("crear-area");

            Route::get('/editar/{id}', 'editar')
                ->name("editar-area");

            Route::get('/eliminar', 'eliminar');

            Route::post('/actualizar', 'actualizar')
                ->name("actualizar-area");
        });

    Route::controller(PreguntaSignificativaController::class)->prefix("admin/preguntas")
        ->group(function () {
            Route::get('/{idArea}', 'preguntas');

            Route::post('/crear', 'crear')
                ->name("crear-pregunta");

            Route::get('/editar/{id}', 'editar')
                ->name("editar-pregunta");

            Route::get('/eliminar', 'eliminar');

            Route::post('/actualizar', 'actualizar')
                ->name("actualizar-pregunta");
        });

    // USUARIOS:
    Route::controller(UsersController::class)->prefix("admin/usuarios")
        ->group(function () {
            Route::get('/', 'users')
                ->name("lista-usuarios");

            Route::get('/nuevo', 'nuevo');

            Route::get('/editar/{id}', 'editar')
                ->name("editar-user");

            Route::get('/eliminar', 'eliminar');

            Route::post('/crear', 'crear')
                ->name("crear-user");

            Route::post('/actualizar', 'actualizar')
                ->name("actualizar-user");

        });
});
