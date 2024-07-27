<?php

use App\Http\Controllers\AreaNivelSuperiorController;
use App\Http\Controllers\ClassificationDataController;
use App\Http\Controllers\FormAreaController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FormPreguntaController;
use App\Http\Controllers\FormProyectoClassificationDataController;
use App\Http\Controllers\PreguntaSignificativaController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::view("/", "welcome");

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('home');

    // USUARIO:
    Route::controller(UserDataController::class)
        ->prefix("usuario")
        ->group(function () {
            Route::get('/perfil', 'perfil');

            Route::get('/mis-formularios', 'myForms')
                ->name("mis-formularios");

            Route::get('/formulario/areas/{idForm}', 'formAreas')
                ->name("formulario-areas");

            Route::get('/formulario/preguntas/{idForm}', 'formPreguntas')
                ->name("form-preguntas");

            Route::get('/formulario/datos-clasificacion/{idForm}', 'formClassificationData')
                ->name("form-classification-data");
        });

    // PROYECTOS:
    Route::controller(ProyectoController::class)
        ->prefix("admin/proyectos")
        ->group(function () {
            Route::get('/', 'proyectos')
                ->name("lista-proyectos");

            Route::get('/nuevo', 'nuevo')
                ->name("nuevo-proyecto");

            Route::get('/editar/{id}', 'editar')
                ->name("editar-proyecto");

            Route::get('/eliminar/{idProyecto}', 'delete')
                ->name("delete-proyecto");

            Route::get('/participantes/{idProyecto}', 'participantes')
                ->name("participantes-proyecto");

            Route::post('/crear', 'crear')
                ->name("crear-proyecto");

            Route::post('/actualizar', 'actualizar')
                ->name("actualizar-proyecto");

            Route::get('/publicar/{idProyecto}', 'publicar')
                ->name("publicar-proyecto");

            Route::get('/despublicar/{idProyecto}', 'desPublicar')
                ->name("despublicar-proyecto");

            Route::get('/datos-clasificacion/{id}', 'datosClasificacion')
                ->name("datos-clasificacion-proyecto");

            Route::post('/datos-clasificacion/guardar', 'saveDatosClasificacion')
                ->name("guardar-datos-clasificacion-proyecto");
        });

    // AREAS:
    Route::controller(AreaNivelSuperiorController::class)
        ->prefix("admin/areas")
        ->group(function () {
            Route::get('/{idProyecto}', 'areas')
                ->name("listar-areas");

            Route::post('/crear', 'crear')
                ->name("crear-area");

            Route::get('/editar/{id}', 'editar')
                ->name("editar-area");

            Route::get('/eliminar/{idArea}', 'delete')
                ->name("delete-area");

            Route::post('/actualizar', 'actualizar')
                ->name("actualizar-area");
        });

    // PREGUNTAS SIGNIFICATIVAS:
    Route::controller(PreguntaSignificativaController::class)
        ->prefix("admin/preguntas")
        ->group(function () {
            Route::get('/{idArea}', 'preguntas')
                ->name("lista-preguntas");

            Route::post('/crear', 'crear')
                ->name("crear-pregunta");

            Route::get('/editar/{idPregunta}', 'editar')
                ->name("editar-pregunta");

            Route::get('/eliminar/{idPregunta}', 'delete')
                ->name("delete-pregunta");

            Route::post('/actualizar', 'actualizar')
                ->name("actualizar-pregunta");
        });

    // USUARIOS:
    Route::controller(UsersController::class)
        ->prefix("admin/usuarios")
        ->group(function () {
            Route::get('/', 'users')
                ->name("lista-users");

            Route::get('/nuevo', 'nuevo');

            Route::get('/editar/{id}', 'editar')
                ->name("editar-user");

            Route::get('/eliminar/{idUser}', 'delete')
                ->name("delete-user");

            Route::post('/crear', 'crear')
                ->name("crear-user");

            Route::post('/actualizar', 'actualizar')
                ->name("actualizar-user");

            Route::post('/ajax-update', 'ajaxUpdate')
                ->name("ajax-update-user");

            Route::post('/ajax-update-password', 'ajaxUpdatePassword')
                ->name("ajax-update-password");
        });

    // DATOS DE CLASIFICACIÓN:
    Route::controller(ClassificationDataController::class)
        ->prefix("admin/datos-clasificacion")
        ->group(function () {
            Route::get('/', 'index')
                ->name("lista-datos-clasificacion");

            Route::get('/nuevo', 'nuevo');

            Route::get('/editar/{id}', 'editar')
                ->name("editar-dato-clasificacion");

            Route::get('/eliminar', 'eliminar');

            Route::get('/opciones/{idClassificationData}', 'options')
                ->name("options-dato-clasificacion");

            Route::get('/opciones/editar/{id}', 'editOption')
                ->name("editar-option");

            Route::post('/actualizar', 'actualizar')
                ->name("actualizar-dato-clasificacion");

            Route::post('/crear', 'crear')
                ->name("crear-dato-clasificacion");

            Route::post('/opciones/crear', 'createOption')
                ->name("crear-options");

            Route::post('/opciones/actualizar', 'updateOption')
                ->name("actualizar-option");
        });

    // FORMULARIOS:
    Route::controller(FormController::class)
        ->prefix("admin/formularios")
        ->group(function () {
            Route::post('/crear', 'create')
                ->name("crear-formulario");

            Route::get('/eliminar/{idForm}', 'delete')
                ->name("eliminar-formulario");
        });

    // FORMULARIO -> AREAS:
    Route::controller(FormAreaController::class)
        ->prefix("form-areas")
        ->group(function () {
            Route::post('/create', 'create')
                ->name("create-form-areas");
        });

    // FORMULARIO -> PREGUNTAS:
    Route::controller(FormPreguntaController::class)
        ->prefix("form-preguntas")
        ->group(function () {
            Route::post('/create', 'create')
                ->name("create-form-preguntas");
        });

    // FormProyectoClassificationData
    Route::controller(FormProyectoClassificationDataController::class)
        ->prefix("form-classification-data")
        ->group(function () {
            Route::post('/create', 'create')
                ->name("create-form-classification-data");
        });
});
