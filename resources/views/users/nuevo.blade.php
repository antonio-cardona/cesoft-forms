@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuario Nuevo</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">Crear Nuevo Usuario</div>

            <div class="card-body">
                <form id="form-crear-user" action="{{ route('crear-user') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nombre del nuevo usuario" required>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="country_id">Nacionalidad</label>

                                <select id="country_id" name="country_id" class="custom-select">
                                    <option value="0">Selecciona un País</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">
                                            {{ $country->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="role">Rol</label>
                                <select class="custom-select" id="role" name="role">
                                    @foreach ($roles as $roleValue => $role)
                                        <option value="{{ $roleValue }}">
                                            {{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm d-flex d-align-items-center justify-content-center">
                            <div class="form-group">
                                <button id="btn-crear-user" type="button" class="btn btn-info mx-1">
                                    <i class="fas fa-plus"></i> Crear Usuario
                                </button>
                                <button id="btn-cancelar" type="button" class="btn btn-secondary mx-1">
                                    <i class="fas fa-window-close"></i> Cancelar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    @vite(['resources/js/admin/users/nuevo.js'])
@stop
