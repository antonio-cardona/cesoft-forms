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
    <div class="container">
        @if ($totalPreguntas < 10)
            <div class="card mb-5">
                <div class="card-header bg-info">Crear Nueva Pregunta</div>

                <div class="card-body">
                    <form id="form-crear-pregunta" action="{{ route('crear-pregunta') }}" method="POST">
                        @csrf
                        <input type="hidden" name="area_nivel_superior_id" value="{{ $area->id }}" />
                        <div class="row">
                            <div class="col-sm align-middle">
                                <input type="text" class="form-control" id="texto" name="texto" placeholder="Pregunta"
                                    required>
                            </div>
                            <div class="col-sm align-middle">
                                <button id="btn-crear-pregunta" type="button" class="btn btn-info">
                                    <i class="fas fa-plus"></i> Crear Pregunta
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif

        <table id="tabla-preguntas" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th width="60%">Pregunta</th>
                    <th width="30%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($preguntas as $pregunta)
                    <tr>
                        <td>{{ $pregunta->texto }}</td>
                        <td class="align-middle">
                            <div class="btn-toolbar" role="toolbar" aria-label="">
                                <div class="btn-group" role="group" aria-label="">
                                    <a role="button" class="btn btn-primary btn-sm btn-ans mr-1"
                                        data-toggle="tooltip" data-placement="top" title="Editar la Pregunta"
                                        href="/admin/preguntas/editar/{{ $pregunta->id }}"">
                                        <i class=" fas fa-plus"></i> Editar
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip"
                                        data-placement="top" title="Eliminar Área"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Pregunta</th>
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
