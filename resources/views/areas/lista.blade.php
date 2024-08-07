@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Proyecto: {{ $proyecto->nombre }}</h1>
    <br>
    <h4>Areas de Nivel Superior</h4>
@stop

@section('content')
    <div class="container">
        @if ($totalAreas < 20)
            <div class="card">
                <div class="card-header bg-info">Crear Nueva Área</div>

                <div class="card-body">
                    <form id="form-crear-area" action="{{ route('crear-area') }}" method="POST">
                        @csrf
                        <input type="hidden" name="proyecto_id" value="{{ $proyecto->id }}" />

                        <div class="row">
                            <div class="col-sm-5 align-middle">
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    placeholder="Nombre del Área" required>
                            </div>
                            <div class="col-sm-7 align-middle">
                                <button id="btn-crear-area" type="button" class="btn btn-info">
                                    <i class="fas fa-plus"></i> Crear Área
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif
        <br />

        <table id="tabla-ans" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th width="60%">Área</th>
                    <th width="40%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($areas as $area)
                    <tr>
                        <td>{{ $area->nombre }}</td>
                        <td>
                            <div class="btn-toolbar" role="toolbar" aria-label="">
                                <div class="btn-group" role="group" aria-label="Diseño Formulario">
                                    <a role="button" class="btn btn-info btn-sm btn-ans mr-1"
                                        data-toggle="tooltip" data-placement="top" title="Preguntas Significativas"
                                        href="/admin/preguntas/{{ $area->id }}"">
                                        <i class="fas fa-plus"></i> Preguntas
                                    </a>
                                    <a role="button" class="btn btn-info btn-sm btn-ans mr-1"
                                        data-toggle="tooltip" data-placement="top" title="Editar Area de Nivel Superior"
                                        href="/admin/areas/editar/{{ $area->id }}"">
                                        <i class=" fas fa-edit"></i>
                                    </a>
                                    @if ($proyecto->status == "SIN-PUBLICAR")
                                        <button type="button" class="btn btn-danger btn-sm btn-eliminar-area" data-toggle="tooltip"
                                            data-placement="top" title="Eliminar Área"
                                            data-area-id="{{ $area->id }}">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nombre</th>
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
    @vite(['resources/js/admin/areas/areas.js'])
@stop
