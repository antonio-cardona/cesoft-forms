@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Usuario: {{ $user->name }}</h1>
@stop

@section('content')
    <div id="alert-error" class="alert alert-danger" style="display: none" role="alert">
        Debes llenar el formulario.
    </div>

    <div class="container">
        <form id="form-actualizar-user" action="{{ route('actualizar-user') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">
            <input type="hidden" name="role_user" id="role_user" value="{{ $user->role }}">
            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="" required value="{{ $user->name }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                            placeholder="" required value="{{ $user->email }}">
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="role">Rol</label>
                        <select class="custom-select" id="role" name="role">
                            <option value="PARTICIPANTE">Participante</option>
                            <option value="INVESTIGADOR">Investigador</option>
                            <option value="ADMINISTRADOR">Administrador</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button id="btn-actualizar-user" type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Actualizar Usuario</button>
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
    @vite(['resources/js/admin/users/editar.js'])
@stop
