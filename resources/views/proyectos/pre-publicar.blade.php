@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Publicar Proyecto</h1>
@stop

@section('content')
    <div class="container">
        <form id="form-publicar-proyecto" action="{{ route('publicar-proyecto', [$proyecto->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre: </label>
                {{ $proyecto->nombre }}
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripción: </label>
                {{ $proyecto->descripcion }}
            </div>
            <div class="form-group">
                <button id="btn-actualizar-proyecto" type="button" class="btn btn-info">
                    <i class="fas fa-upload"></i> Confirmar publicación de proyecto</button>
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
    @vite(['resources/js/admin/proyectos/editar.js'])
@stop
