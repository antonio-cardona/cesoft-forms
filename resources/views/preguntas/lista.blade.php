@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Proyecto: <a href="">{{ $proyecto->nombre }}</a></h1>
    <br>
    <h3>Area de Nivel Superior: <a href="">{{ $area->nombre }}</a></h3>
    <br>
    <h3>Preguntas Significativas</h3>
@stop

@section('content')
    <div id="alert-error" class="alert alert-danger" style="display: none" role="alert">
        Debes llenar el formulario.
    </div>

    <div class="container">
        <form id="form-crear-pregunta" action="{{ route('crear-pregunta') }}" method="POST">
            @csrf
            <input type="hidden" name="area_nivel_superior_id" value="{{ $area->id }}" />
            <div class="row">
                <div class="col-sm align-middle">
                    <input type="text" class="form-control" id="texto" name="texto" placeholder="Pregunta"
                        required>
                </div>
                <div class="col-sm align-middle">
                    <button id="btn-crear-pregunta" type="button" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Crear Pregunta
                    </button>
                </div>
            </div>
        </form>
        <br />
        <table id="tabla-ans" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th width="10%">ID</th>
                    <th width="60%">Pregunta</th>
                    <th width="30%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($preguntas as $pregunta)
                    <tr>
                        <td>{{ $pregunta->id }}</td>
                        <td>{{ $pregunta->texto }}</td>
                        <td class="align-middle">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <a role="button" class="btn btn-outline-primary btn-sm btn-ans"
                                            data-toggle="tooltip" data-placement="top" title="Editar la Pregunta"
                                            href="/admin/preguntas/editar/{{ $pregunta->id }}"">
                                            <i class=" fas fa-plus"></i> Editar
                                        </a>
                                    </div>
                                    <div class="col-sm">
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="tooltip"
                                            data-placement="top" title="Eliminar Área"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    @vite(['resources/js/admin/preguntas/preguntas.js'])
@stop
