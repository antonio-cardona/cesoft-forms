@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Proyecto: {{ $proyecto->nombre }}</h1>
    <br>
    <h4>Areas de Nivel Superior</h4>
@stop

@section('content')
    <div id="alert-error" class="alert alert-danger" style="display: none" role="alert">
        Debes llenar el formulario.
    </div>

    <div class="container">
        <form id="form-crear-area" action="{{ route('crear-area') }}" method="POST">
            @csrf
            <input type="hidden" name="proyecto_id" value="{{ $proyecto->id }}" />
            <div class="row">
                <div class="col-sm align-middle">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Área"
                        required>
                </div>
                <div class="col-sm align-middle">
                    <button id="btn-crear-area" type="button" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Crear Área
                    </button>
                </div>
            </div>
        </form>

        <br/>

        <table id="tabla-ans" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="60%">Área</th>
                    <th width="35%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($areas as $area)
                    <tr>
                        <td>{{ $area->id }}</td>
                        <td>{{ $area->nombre }}</td>
                        <td class="align-middle">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <a role="button" class="btn btn-outline-primary btn-sm btn-ans"
                                            data-toggle="tooltip" data-placement="top" title="Preguntas Significativas"
                                            href="/admin/preguntas/{{ $area->id }}"">
                                            <i class="fas fa-plus"></i> Preguntas
                                        </a>
                                    </div>
                                    <div class="col-sm">
                                        <a role="button" class="btn btn-outline-primary btn-sm btn-ans"
                                            data-toggle="tooltip" data-placement="top" title="Editar Area de Nivel Superior"
                                            href="/admin/areas/editar/{{ $area->id }}"">
                                            <i class=" fas fa-edit"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm">
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="tooltip"
                                            data-placement="top" title="Eliminar Área"><i
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
    @vite(['resources/js/admin/areas/areas.js'])
@stop
