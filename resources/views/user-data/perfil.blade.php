@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Perfil</h1>
@stop

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-info">Datos Personales</div>

                    <div class="card-body">
                        <form id="form-actualizar-proyecto">
                            @csrf
                            <input type="hidden" id="user_id" value="{{ $user->id }}">

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Nombre del usuario" required value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nombre">Email</label>
                                        <input class="form-control" id="email" name="email" required
                                            value="{{ $user->email }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="country_id">Nacionalidad</label>

                                        <select id="country_id" name="country_id" class="custom-select">
                                            <option value="0">Selecciona un País</option>
                                            @foreach ($countries as $country)
                                                @php
                                                    $selected = '';
                                                    if ($idCurrentCountry == $country->id) {
                                                        $selected = 'selected=true';
                                                    }
                                                @endphp
                                                <option value="{{ $country->id }}" {{ $selected }}>
                                                    {{ $country->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="objetivo">Rol</label>
                                        <input class="form-control" value="{{ $user->role }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col d-flex d-align-items-center justify-content-center">
                                    <div class="form-group">
                                        <button id="btn-save-user-data" type="button" class="btn btn-info mx-1">
                                            <i class="fas fa-save"></i> Actualizar Datos</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header bg-info">Cambiar Clave</div>

                    <div class="card-body">
                        <form id="form-update-password" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-7">
                                    <div class="form-group">
                                        <label for="nombre">Nueva Clave</label>
                                        <input type="password" class="form-control" id="new_password" name="new_password"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-7">
                                    <div class="form-group">
                                        <label for="nombre">Repetir Nueva Clave</label>
                                        <input type="password" class="form-control" required id="repeat_new_password"
                                            name="repeat_new_password">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col d-flex d-align-items-center justify-content-center">
                                    <div class="form-group">
                                        <button id="btn-save-password" type="button" class="btn btn-info mx-1">
                                            <i class="fas fa-save"></i> Actualizar Clave</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    @vite(['resources/js/user/perfil.js'])
@stop
