@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Proyectos</h1>
@stop

@section('content')
    <button id="btn-nuevo-proyecto" type="button" class="btn btn-primary">Nuevo Proyecto</button>

    <table id="tabla-proyectos" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th width="10%">ID</th>
                <th width="30%">Nombre</th>
                <th width="40%">Descripción</th>
                <th width="20%">Acciones</th>
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
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="tooltip"
                                        data-placement="top" title="Áreas de Nivel Superior"><i class="fas fa-plus"></i>
                                        ANS</button>
                                </div>
                                <div class="col-sm">
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="tooltip"
                                        data-placement="top" title="Eliminar Proyecto"><i class="fas fa-minus"></i></button>
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
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    @vite(['resources/js/admin/proyectos.js'])
@stop
