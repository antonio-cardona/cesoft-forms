@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Proyecto Nuevo</h1>
@stop

@section('content')
    <div id="alert-error" class="alert alert-danger" style="display: none" role="alert">
        Debes llenar el formulario.
    </div>

    <form id="form-crear-proyecto" action="{{ route('crear-proyecto') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del nuevo proyecto" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
        </div>
        <div class="form-group">
            <button id="btn-crear-proyecto" type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Crear
                Proyecto</button>
            <button id="btn-cancelar" type="button" class="btn btn-secondary"><i class="fas fa-window-close"></i>
                Cancelar</button>
        </div>
    </form>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    @vite(['resources/js/admin/proyectos/nuevo.js'])
@stop
