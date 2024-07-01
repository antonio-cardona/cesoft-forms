@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mis Formularios</h1>
@stop

@section('content')
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
                                        href="{{ route('formulario-areas', [$form->id]) }}">
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
    {{-- @vite(['resources/js/admin/proyectos/proyectos.js']) --}}
@stop
