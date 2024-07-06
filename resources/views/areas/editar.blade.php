@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Proyecto: <a href="">{{ $proyecto->nombre }}</a></h1>
    <br>
    <h4>Areas de Nivel Superior</h4>
@stop

@section('content')
    <div id="alert-error" class="alert alert-danger" style="display: none" role="alert">
        Debes llenar el formulario.
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header bg-info">Actualizar Área</div>

            <div class="card-body">
                <form id="form-actualizar-area" action="{{ route('actualizar-area') }}" method="POST">
                    @csrf
                    <input type="hidden" id="id_proyecto" value="{{ $proyecto->id }}" />
                    <input type="hidden" name="id" value="{{ $area->id }}" />
                    <div class="row">
                        <div class="col-sm align-middle">
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                placeholder="Nombre del Área" required value="{{ $area->nombre }}">
                        </div>
                        <div class="col-sm align-middle">
                            <button id="btn-actualizar-area" type="button" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Actualizar Área
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
    @vite(['resources/js/admin/areas/editar.js'])
@stop
