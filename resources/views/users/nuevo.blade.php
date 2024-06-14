@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuario Nuevo</h1>
@stop

@section('content')
    <div id="alert-error" class="alert alert-danger" style="display: none" role="alert">
        Debes llenar el formulario.
    </div>

    <div class="container">
        <form id="form-crear-proyecto" action="s{{ route('crear-proyecto') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre"
                    placeholder="Nombre del nuevo proyecto" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <button id="btn-crear-usuario" type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Crear
                    Usuario</button>
                <button id="btn-cancelar" type="button" class="btn btn-secondary"><i class="fas fa-window-close"></i>
                    Cancelar</button>
            </div>
        </form>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    @vite(['resources/js/admin/users/nuevo.js'])
@stop
