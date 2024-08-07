@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Datos de Clasificación</h1>
@stop

@section('content')
    <div class="container">
        <div class="card mb-5">
            <div class="card-header bg-info">Crear Nuevo Dato de Clasificación</div>

            <div class="card-body">
                <form id="form-crear-dato-clasificacion" action="{{ route('crear-dato-clasificacion') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm align-middle">
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                placeholder="Nombre del Dato de Clasificación" required>
                        </div>
                        <div class="col-sm align-middle">
                            <button id="btn-crear-dato-clasificacion" type="button" class="btn btn-info">
                                <i class="fas fa-plus"></i> Crear Dato de Clasificación
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <table id="tabla-datos-clasificacion" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th width="50%">Dato de Clasificación</th>
                    <th width="25%">Opciones de Respuesta</th>
                    <th width="25%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classificationData as $cData)
                    <tr>
                        <td>{{ $cData->nombre }}</td>
                        <td class="align-middle">
                            <a role="button" class="btn btn-primary btn-sm btn-ans" data-toggle="tooltip"
                                data-placement="top" title="Opciones de Respuesta"
                                href="{{ route('options-dato-clasificacion', [$cData->id]) }}">
                                <i class="fas fa-plus"></i> Opciones de respuesta
                            </a>
                            <span class="badge badge-success ml-2 p-2" data-toggle="tooltip" data-placement="top"
                                title="{{ count($cData->options) }} Opciones de Respuesta">{{ count($cData->options) }}</span>
                        </td>
                        <td class="align-middle">
                            <div class="btn-toolbar" role="toolbar" aria-label="">
                                <div class="btn-group" role="group" aria-label="">
                                    <a role="button" class="btn btn-primary btn-sm btn-ans mr-1" data-toggle="tooltip"
                                        data-placement="top" title="Editar Dato de Clasificación"
                                        href="{{ route('editar-dato-clasificacion', [$cData->id]) }}">
                                        <i class=" fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip"
                                        data-placement="top" title="Eliminar Dato de Clasificación">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
    </div>
    </td>
    </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Dato de Clasificación</th>
            <th>Opciones de Respuesta</th>
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
    @vite(['resources/js/admin/datos-clasificacion/lista.js'])
@stop
