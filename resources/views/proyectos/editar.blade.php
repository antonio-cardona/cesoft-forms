@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Proyecto: {{ $proyecto->nombre }}</h1>
@stop

@section('content')
    <div id="alert-error" class="alert alert-danger" style="display: none" role="alert">
        Debes llenar el formulario.
    </div>

    <div class="container">
        <form id="form-actualizar-proyecto" action="{{ route('actualizar-proyecto') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $proyecto->id }}">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            placeholder="Nombre del nuevo proyecto" required value="{{ $proyecto->nombre }}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="nombre">Fecha Final</label>
                        <input class="form-control" id="fecha_final" name="fecha_final" required value="{{ $proyecto->fecha_final }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="objetivo">Objetivo</label>
                        <textarea class="form-control" id="objetivo" name="objetivo" rows="3">{{ $proyecto->objetivo }}</textarea>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $proyecto->descripcion }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <button id="btn-actualizar-proyecto" type="button" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Actualizar Proyecto</button>
                        <button id="btn-cancelar" type="button" class="btn btn-secondary"><i class="fas fa-window-close"></i>
                            Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@stop

@section('js')
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/messages/messages.es-es.js" type="text/javascript"></script>
    @vite(['resources/js/admin/proyectos/editar.js'])
@stop
