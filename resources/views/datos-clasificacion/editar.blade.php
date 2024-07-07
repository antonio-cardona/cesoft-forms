@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Datos de Clasificación</h1>
@stop

@section('content')
    <div class="container">
        <div class="card mb-5">
            <div class="card-header bg-info">Editar Dato de Clasificación</div>

            <div class="card-body">
                <form id="form-actualizar-dato-clasificacion" action="{{ route('actualizar-dato-clasificacion') }}"
                    method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $classificationData->id }}" />
                    <div class="row">
                        <div class="col-sm align-middle">
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                placeholder="Nombre del Dato de Clasificación" required
                                value="{{ $classificationData->nombre }}">
                        </div>
                        <div class="col-sm align-middle">
                            <button id="btn-actualizar-dato-clasificacion" type="button" class="btn btn-info">
                                <i class="fas fa-plus"></i> Actualizar Dato de Clasificación
                            </button>
                            <a id="btn-cancelar" role="button" class="btn btn-secondary"
                                href="{{ route('lista-datos-clasificacion') }}">
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
    @vite(['resources/js/admin/datos-clasificacion/editar.js'])
@stop
