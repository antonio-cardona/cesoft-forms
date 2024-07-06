@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Proyectos</h1>
    <h2>Participantes</h2>
@stop

@section('content')
    <div class="modal fade" id="modal-publicar-proyecto" tabindex="-1" aria-labelledby="modal-publicar-proyecto"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Publicar Proyecto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Confirma que desea publicar el proyecto <strong id="modal-nombre-proyecto"
                            class="text-primary"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a id="btn-confirmar-publicacion" role="button" class="btn btn-primary" href="">
                        Si
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card mb-5">
            <div class="card-header bg-info">Participantes Disponibles</div>

            <div class="card-body">
                <form id="form-agregar-participante" action="{{ route('crear-formulario') }}" method="POST">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="proyecto_id" value="{{ $proyecto->id }}">
                        <div class="col-sm-6">
                            <label for="">Selecciona el participante</label>
                            <select name="user_id" class="custom-select" required>
                                @foreach ($participantesDisponibles as $participante)
                                    <option value="{{ $participante->id }}">{{ $participante->name }} ({{ $participante->email }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4 d-flex align-items-end">
                            <button id="btn-agregar-participante" type="submit" class="btn btn-info">
                                <i class="fas fa-plus"></i> Agregar participante al proyecto
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <table id="tabla-participantes-proyecto" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th width="20%">Nombre</th>
                    <th width="23%">Email</th>
                    <th width="27%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($participantesProyecto as $form)
                    <tr>
                        <td>{{ $form->user->name }}</td>
                        <td>{{ $form->user->email }}</td>
                        <td>
                            <div class="btn-toolbar" role="toolbar" aria-label="">

                                <div class="btn-group mr-2" role="group" aria-label="Datos Proyecto">
                                    <a role="button" class="btn btn-danger btn-sm btn-ans" data-toggle="tooltip"
                                        data-placement="top" title="Remover al participante del proyecto"
                                        href="{{ route("eliminar-formulario", [$form->id]) }}">
                                        <i class=" fas fa-minus"></i> Remover participante
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
    @vite(['resources/js/admin/proyectos/participantes.js'])
@stop
