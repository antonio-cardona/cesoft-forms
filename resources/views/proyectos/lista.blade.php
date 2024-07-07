@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Proyectos</h1>
@stop

@section('content')
    <div class="modal fade" id="modal-publicar-proyecto" tabindex="-1" aria-labelledby="modal-publicar-proyecto" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Publicar Proyecto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Confirma que desea publicar el proyecto <strong id="modal-nombre-proyecto" class="text-primary"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a id="btn-confirmar-publicacion" role="button" class="btn btn-primary"
                        href="">
                        Si
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-despublicar-proyecto" tabindex="-1" aria-labelledby="modal-despublicar-proyecto" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Desactivar Proyecto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Confirma que desea desactivar el proyecto <strong id="modal-nombre-proyecto" class="text-primary"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a id="btn-confirmar-despublicacion" role="button" class="btn btn-primary"
                        href="">
                        Si
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm"></div>
        </div>
        <button id="btn-nuevo-proyecto" type="button" class="btn btn-primary my-3" style="margin-bottom: 12px;">
            Crear nuevo Proyecto
        </button>

        <table id="tabla-proyectos" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th width="20%">Nombre</th>
                    <th width="23%">Descripción</th>
                    <th width="15%">Fecha Final</th>
                    <th width="15%">Status</th>
                    <th width="27%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proyectos as $proyecto)
                    <tr>
                        <td>{{ $proyecto->nombre }}</td>
                        <td>{{ $proyecto->descripcion }}</td>
                        <td>{{ $proyecto->fecha_final }}</td>
                        <td>{{ $proyecto->status }}</td>
                        <td>
                            <div class="btn-toolbar" role="toolbar" aria-label="">
                                <div class="btn-group mr-2" role="group" aria-label="Diseño Formulario">
                                    <a role="button" class="btn btn-primary btn-sm btn-ans mr-1" data-toggle="tooltip"
                                        data-placement="top" title="Áreas de Nivel Superior"
                                        href="/admin/areas/{{ $proyecto->id }}"">
                                        <i class=" fas fa-plus"></i> ANS
                                    </a>
                                    <a role="button" class="btn btn-primary btn-sm btn-ans mr-1" data-toggle="tooltip"
                                        data-placement="top" title="Datos de Clasificación"
                                        href="{{ route('datos-clasificacion-proyecto', [$proyecto->id]) }}">
                                        <i class=" fas fa-info-circle"></i>
                                    </a>
                                    <a role="button" class="btn btn-primary btn-sm btn-ans mr-1" data-toggle="tooltip"
                                        data-placement="top" title="Participantes del Proyecto"
                                        href="{{ route('participantes-proyecto', [$proyecto->id]) }}">
                                        <i class=" fas fa-users-cog"></i>
                                    </a>
                                    <button
                                        class="btn btn-primary btn-sm btn-ans btn-publicar-proyecto"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{ $proyecto->status == "SIN-PUBLICAR" ? "Publicar" : "Desactivar" }} proyecto"
                                        data-target-label="{{ $proyecto->status == "SIN-PUBLICAR" ? "publicar" : "desactivar" }}"
                                        data-proyecto-nombre="{{ $proyecto->nombre }}"
                                        data-url="{{ $proyecto->status == "SIN-PUBLICAR" ? route('publicar-proyecto', [$proyecto->id]) : route('despublicar-proyecto', [$proyecto->id]) }}"
                                    >
                                        @if ($proyecto->status == "SIN-PUBLICAR")
                                            <i class=" fas fa-upload"></i>
                                        @else
                                            <i class=" fas fa-download"></i>
                                        @endif
                                    </button>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="Datos Proyecto">
                                    <a role="button" class="btn btn-primary btn-sm btn-ans mr-1" data-toggle="tooltip"
                                        data-placement="top" title="Editar proyecto"
                                        href="/admin/proyectos/editar/{{ $proyecto->id }}"">
                                        <i class=" fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip"
                                        data-placement="top" title="Eliminar Proyecto">
                                        <i class="fas fa-minus"></i>
                                    </button>
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
                    <th>Fecha Final</th>
                    <th>Status</th>
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
