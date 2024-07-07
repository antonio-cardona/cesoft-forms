@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Proyecto: {{ $proyecto->nombre }}</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">Editar Proyecto</div>

            <div class="card-body">
                <form id="form-actualizar-proyecto" action="{{ route('actualizar-proyecto') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $proyecto->id }}">
                    <input type="hidden" name="id_proyecto_researcher" value="{{ $idProyectoResearcher }}">
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
                                <input class="form-control" id="fecha_final" name="fecha_final" required
                                    value="{{ $proyecto->fecha_final }}">
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
                        <div class="col-6">
                            <div class="form-group">
                                <label for="researcher_id">Investigador Asignado</label>
                                <select id="researcher_id" name="researcher_id" class="custom-select">
                                    <option value="0">Selecciona un Investigador</option>
                                    @foreach ($researchers as $researcher)
                                        @php
                                            $selected = '';
                                            if ($idCurrentResearcher == $researcher->id) {
                                                $selected = 'selected=true';
                                            }
                                        @endphp
                                        <option value="{{ $researcher->id }}" {{ $selected }}>{{ $researcher->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col d-flex d-align-items-center justify-content-center">
                            <div class="form-group">
                                <button id="btn-actualizar-proyecto" type="button" class="btn btn-info mx-1">
                                    <i class="fas fa-plus"></i> Actualizar Proyecto</button>
                                <button id="btn-cancelar" type="button" class="btn btn-secondary mx-1"><i
                                        class="fas fa-window-close"></i>
                                    Cancelar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


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
