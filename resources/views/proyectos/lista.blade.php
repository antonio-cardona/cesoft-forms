@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Proyectos</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm"></div>
        </div>
        <button id="btn-nuevo-proyecto" type="button" class="btn btn-primary" style="margin-bottom: 12px;">
            Nuevo Proyecto
        </button>

        <table id="tabla-proyectos" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="29%">Nombre</th>
                    <th width="29%">Descripción</th>
                    <th width="37%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proyectos as $proyecto)
                    <tr>
                        <td>{{ $proyecto->id }}</td>
                        <td>{{ $proyecto->nombre }}</td>
                        <td>{{ $proyecto->descripcion }}</td>
                        <td class="align-middle">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <a role="button" class="btn btn-outline-primary btn-sm btn-ans"
                                            data-toggle="tooltip" data-placement="top" title="Áreas de Nivel Superior"
                                            href="/admin/areas/{{ $proyecto->id }}"">
                                            <i class=" fas fa-plus"></i> ANS
                                        </a>
                                    </div>
                                    <div class="col-sm">
                                        <a role="button" class="btn btn-outline-primary btn-sm btn-ans"
                                            data-toggle="tooltip" data-placement="top" title="Datos de Clasificación"
                                            href="{{ route('datos-clasificacion-proyecto', [$proyecto->id]) }}">
                                            <i class=" fas fa-info-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm">
                                        <a role="button" class="btn btn-outline-primary btn-sm btn-ans"
                                            data-toggle="tooltip" data-placement="top" title="Publicar proyecto"
                                            href="{{ route('pre-publicar-proyecto', [$proyecto->id]) }}">
                                            <i class=" fas fa-upload"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm">
                                        <a role="button" class="btn btn-outline-primary btn-sm btn-ans"
                                            data-toggle="tooltip" data-placement="top" title="Editar proyecto"
                                            href="/admin/proyectos/editar/{{ $proyecto->id }}"">
                                            <i class=" fas fa-edit"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm">
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="tooltip"
                                            data-placement="top" title="Eliminar Proyecto"><i
                                                class="fas fa-minus"></i></button>
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
    @vite(['resources/js/admin/proyectos/proyectos.js'])
@stop
