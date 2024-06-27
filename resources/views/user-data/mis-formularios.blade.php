@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mis Formularios</h1>
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
        <table id="tabla-mis-formularios" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th width="20%">Nombre</th>
                    <th width="23%">Descripción</th>
                    <th width="15%">Fecha Final</th>
                    <th width="27%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($forms as $form)
                    <tr>
                        <td>{{ $form->proyecto->nombre }}</td>
                        <td>{{ $form->proyecto->descripcion }}</td>
                        <td>{{ $form->proyecto->fecha_final }}</td>
                        <td>
                            <div class="btn-toolbar" role="toolbar" aria-label="">
                                <div class="btn-group mr-2" role="group" aria-label="Diseño Formulario">
                                    <a role="button" class="btn btn-outline-primary btn-lg btn-ans" data-toggle="tooltip"
                                        data-placement="top" title="Áreas de Nivel Superior"
                                        href="/admin/areas/{{ $form->proyecto->id }}"">
                                        <i class=" fas fa-edit"></i> Llenar el formulario
                                    </a>
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
