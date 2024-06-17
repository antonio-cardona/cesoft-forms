@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Datos de Clasificación</h1>
@stop

@section('content')
    <div id="alert-error" class="alert alert-danger" style="display: none" role="alert">
        Debes llenar el formulario.
    </div>

    <div class="container">
        <form id="form-actualizar-dato-clasificacion" action="{{ route('actualizar-dato-clasificacion') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $classificationData->id }}" />
            <div class="row">
                <div class="col-sm align-middle">
                    <input type="text" class="form-control" id="nombre" name="nombre"
                        placeholder="Nombre del Dato de Clasificación" required value="{{ $classificationData->nombre }}">
                </div>
                <div class="col-sm align-middle">
                    <button id="btn-actualizar-dato-clasificacion" type="button" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Actualizar Dato de Clasificación
                    </button>
                    <a id="btn-cancelar" role="button" class="btn btn-secondary"
                        href="{{ route("lista-datos-clasificacion") }}">
                        <i class="fas fa-window-close"></i> Cancelar
                    </a>
                </div>
            </div>
        </form>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    @vite(['resources/js/admin/datos-clasificacion/editar.js'])
@stop
