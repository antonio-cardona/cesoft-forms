@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Formulario: {{ $proyecto->nombre }}</h1>
    <h4>Fecha Final: {{ $proyecto->fecha_final }}</h4>
@stop

@section('content')
    <div class="container">
        <h4>{{ $area->nombre }} <i class="fas fa-chevron-right"></i> Preguntas Significativas:</h4>
        <br>
        @foreach ($preguntas as $pregunta)
            <div class="row mb-3">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="card bg-primary ">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nombre">¿{{ $pregunta->texto }}?</label>
                                <textarea class="form-control pregunta-answer" id="" name="" rows="3"
                                    data-pregunta-id="{{ $pregunta->id }}">{{ $pregunta->answer }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        @endforeach

        <div class="row py-4">
            <div class="col d-flex d-align-items-center justify-content-center">
                <input id="id-form" type="hidden" value="{{ $form->id }}">
                <button id="btn-go-back-areas" type="button" class="btn btn-info btn-lg mx-3">
                    <i class="far fa-arrow-alt-circle-left"></i> Volver a Áreas
                </button>
                <button id="btn-save-form-preguntas-answers" type="button" class="btn btn-info btn-lg mx-3">
                    Guardar Respuestas y Continuar <i class="far fa-arrow-alt-circle-right"></i>
                </button>
            </div>
        </div>
    </div>
@stop

@section('css')
    @vite(['resources/sass/forms.scss'])
@stop

@section('js')
    @vite(['resources/js/user/form-preguntas.js'])
@stop
