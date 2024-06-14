@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm"></div>
        </div>
        <button id="btn-nuevo-user" type="button" class="btn btn-primary" style="margin-bottom: 12px;">
            Nuevo Usuario
        </button>

        <table id="tabla-users" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th width="15%">ID</th>
                    <th width="25%">Nombre</th>
                    <th width="25%">Email</th>
                    <th width="20%">Rol</th>
                    <th width="15%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td class="align-middle">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <a role="button" class="btn btn-outline-primary btn-sm btn-ans"
                                            data-toggle="tooltip" data-placement="top" title="Editar el usuario"
                                            href="{{ route('editar-user', [$user->id]) }}"">
                                            <i class=" fas fa-edit"></i> Editar
                                        </a>
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
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
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
    @vite(['resources/js/admin/users/users.js'])
@stop
