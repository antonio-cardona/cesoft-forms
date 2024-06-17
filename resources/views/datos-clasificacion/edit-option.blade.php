@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Datos de Clasificación</h1>
    <br>
    <h4>Opciones de Respuesta para <span class="badge badge-pill badge-info">{{ $classificationData->nombre }}</span></h4>
    <br>
@stop

@section('content')
    <div id="alert-error" class="alert alert-danger" style="display: none" role="alert">
        Debes llenar el formulario.
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header bg-info">Actualizar Opción de Respuesta</div>

            <div class="card-body">
                <form id="form-editar-opcion-respuesta" action="{{ route('actualizar-option') }}" method="POST">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $classificationOption->id }}">
                        <div class="col-sm-6">
                            <label for="exampleInputEmail1">Opcion de Respuesta</label>
                            <input type="text" class="form-control" id="texto" name="texto"
                                value="{{ $classificationOption->texto }}" required>
                        </div>
                        <div class="col-sm-2">
                            <label for="exampleInputEmail1">Orden</label>
                            <input type="number" class="form-control" id="orden" name="orden" min="1" max="50"
                                value="{{ $classificationOption->orden }}" required>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm d-flex d-align-items-center justify-content-center">
                            <button id="btn-actualizar-opcion-respuesta" type="button" class="btn btn-primary mx-3">
                                <i class="fas fa-plus"></i> Actualizar Opción
                            </button>
                            <a id="btn-cancelar" role="button" class="btn btn-secondary mx-3" href="{{ route("options-dato-clasificacion", [$classificationData->id]) }}">
                                <i class="fas fa-window-close"></i> Cancelar
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    @vite(['resources/js/admin/datos-clasificacion/edit-option.js'])
@stop
