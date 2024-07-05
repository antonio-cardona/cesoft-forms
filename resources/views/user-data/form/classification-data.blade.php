@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Formulario: {{ $proyecto->nombre }}</h1>
    <h4>Fecha Final: {{ $proyecto->fecha_final }}</h4>
@stop

@section('content')
    <div class="container">
        <h4>Datos de Clasificación:</h4>
        <br>
        @foreach ($classificationData as $classificationDatum)
            <div class="row mb-3">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="card bg-secondary ">
                        <div class="card-body">
                            <div class="form-group cdata-container"
                                data-proyecto-classification-data-id="{{ $classificationDatum->idProyectoClassificationData }}"
                                data-option-group-name="cdata-radio-{{ $classificationDatum->cDatum->id }}">
                                <label for="nombre">{{ $classificationDatum->cDatum->nombre }}</label>
                                @foreach ($classificationDatum->cDatum->options as $option)
                                    <div class="form-check">
                                        @php
                                            $radioChecked = "";
                                            if ($classificationDatum->selectedIdOption == $option->id) {
                                                $radioChecked = "checked";
                                            }
                                        @endphp
                                        <input class="form-check-input" type="radio"
                                            name="cdata-radio-{{ $classificationDatum->cDatum->id }}"
                                            id="radio-{{ $option->id }}"
                                            value="{{ $option->id }}"
                                            {{ $radioChecked }}>
                                        <label class="form-check-label" for="radio-{{ $option->id }}">
                                            {{ $option->texto }}
                                        </label>
                                    </div>
                                @endforeach
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
                <button id="btn-go-back-preguntas" type="button" class="btn btn-info btn-lg mx-3">
                    <i class="far fa-arrow-alt-circle-left"></i> Volver a Preguntas
                </button>
                <button id="btn-save-form-classification-data-answers" type="button" class="btn btn-info btn-lg mx-3">
                    Guardar Respuestas y Terminar <i class="far fa-check-circle"></i>
                </button>
            </div>
        </div>
    </div>
@stop

@section('css')
    @vite(['resources/sass/forms.scss'])
@stop

@section('js')
    @vite(['resources/js/user/form-classification-data.js'])
@stop
