@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Formulario: {{ $proyecto->nombre }}</h1>
    <h4>Fecha Final: {{ $proyecto->fecha_final }}</h4>
    <h5>{{ $area->nombre }} -> Preguntas Significativas:</h5>
@stop

@section('content')
    <div class="container">
        @foreach ($preguntas as $pregunta)
            <div class="row">
                <div class="col">
                    <div class="area-card card bg-primary " data-area-id="{{ $pregunta->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nombre">¿{{ $pregunta->texto }}?</label>
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="row py-5">
            <div class="col d-flex d-align-items-center justify-content-center">
                <input id="id-form" type="hidden" value="{{ $form->id }}">
                <button id="btn-save-form-area" type="button" class="btn btn-info btn-lg mx-3">
                    Guardar Respuestas y Continuar
                </button>
            </div>
        </div>
    </div>
@stop

@section('css')
    @vite(['resources/sass/forms.scss'])
@stop

@section('js')
    @vite(['resources/js/user/form-area.js'])
@stop
