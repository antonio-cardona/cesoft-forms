@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Proyecto: <a href="{{ route('listar-areas', [$proyecto->id]) }}">{{ $proyecto->nombre }}</a></h1>
    <br>
    <h3>Area de Nivel Superior: {{ $area->nombre }}</h3>
    <br>
    <h3>Preguntas Significativas</h3>
@stop

@section('content')
    <div id="alert-error" class="alert alert-danger" style="display: none" role="alert">
        Debes llenar el formulario.
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header bg-info">Crear Nueva Área</div>

            <div class="card-body">
                <form id="form-actualizar-pregunta" action="{{ route('actualizar-pregunta') }}" method="POST">
                    @csrf
                    <input type="hidden" id="id_area" value="{{ $area->id }}" />
                    <input type="hidden" name="id" value="{{ $pregunta->id }}" />
                    <div class="row">
                        <div class="col-sm align-middle">
                            <input type="text" class="form-control" id="texto" name="texto" placeholder="Pregunta"
                                required value="{{ $pregunta->texto }}">
                        </div>
                        <div class="col-sm align-middle">
                            <button id="btn-actualizar-pregunta" type="button" class="btn btn-info">
                                <i class="fas fa-plus"></i> Actualizar Pregunta
                            </button>
                            <button id="btn-cancelar" type="button" class="btn btn-secondary">
                                <i class="fas fa-window-close"></i> Cancelar
                            </button>
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
    @vite(['resources/js/admin/preguntas/editar.js'])
@stop
