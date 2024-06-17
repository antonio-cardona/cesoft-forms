@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Datos de Clasificación</h1>
    <br>
    <h4>Opciones de Respuesta para <span class="badge badge-pill badge-info">{{ $classificationData->nombre }}</span></h4>
    <br>
@stop

@section('content')
    <div id="alert-error" class="alert alert-danger" style="display: none" role="alert">
        Debes llenar el formulario.
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header bg-info">Crear nueva Opción de Respuesta</div>

            <div class="card-body">
                <form id="form-crear-opcion-respuesta" action="{{ route('crear-options') }}" method="POST">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="classification_data_id" value="{{ $classificationData->id }}">
                        <div class="col-sm-6">
                            <label for="exampleInputEmail1">Opcion de Respuesta</label>
                            <input type="text" class="form-control" id="texto" name="texto" required>
                        </div>
                        <div class="col-sm-2">
                            <label for="exampleInputEmail1">Orden</label>
                            <input type="number" class="form-control" id="orden" name="orden" min="1"
                                max="50" required>
                        </div>
                        <div class="col-sm-4 d-flex align-items-end">
                            <button id="btn-crear-opcion-respuesta" type="button" class="btn btn-info">
                                <i class="fas fa-plus"></i> Crear Opción
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <br />

        <table id="table-options-classification-data" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="60%">Opción de Respuesta</th>
                    <th width="20%">Orden</th>
                    <th width="15%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($options as $option)
                    <tr>
                        <td>{{ $option->id }}</td>
                        <td>{{ $option->texto }}</td>
                        <td>{{ $option->orden }}</td>
                        <td class="align-middle">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a role="button" class="btn btn-outline-primary btn-sm btn-ans"
                                            data-toggle="tooltip" data-placement="top" title="Editar Dato de Clasificación"
                                            href="{{ route("editar-option", [$option->id]) }}">
                                            <i class=" fas fa-edit"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="tooltip"
                                            data-placement="top" title="Eliminar Dato de Clasificación"><i
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
                    <th>ID</th>
                    <th>Opción de Respuesta</th>
                    <th>Orden</th>
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
    @vite(['resources/js/admin/datos-clasificacion/options.js'])
@stop
