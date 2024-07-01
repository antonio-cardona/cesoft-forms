@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Formulario: {{ $proyecto->nombre }}</h1>
    <h4>Fecha Final: {{ $proyecto->fecha_final }}</h4>
@stop

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-7">
                <h5>Áreas Disponibles:</h5>

                <div class="drag-area border rounded-sm p-2">
                    <div class="row row-cols-2">
                        @php
                            $totalOccupiedDropZone = count($availableAreas);
                        @endphp
                        @for ($i = 0; $i < $totalAreas; $i++)
                            @if ($i < $totalOccupiedDropZone)
                                @php
                                    $areaInfo = $availableAreas[$i];
                                @endphp
                                <div class="p-1 dropzone draggable-dropzone--occupied" data-dropzone="1">
                                    <div class="item">
                                        <div class="area-card card bg-success " data-area-id="{{ $areaInfo->id }}">
                                            <div class="card-body">
                                                {{ $areaInfo->nombre }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="dropzone" data-dropzone="1"></div>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <h5>Áreas Seleccionadas:</h5>
                <div class="row">
                    <div class="col-sm-1">
                        @for ($i = 1; $i <= 3; $i++)
                            <div class="order-labels">
                                <h1>{{ $i }}:</h1>
                            </div>
                        @endfor
                    </div>
                    <div class="col-sm-10">
                        <div id="area-selected-list" class="drag-area border rounded-sm p-2">
                            @php
                                $totalOccupiedDropZone = count($selectedAreas);
                            @endphp
                            @for ($i = 1; $i <= 3; $i++)
                                @if ($i <= $totalOccupiedDropZone)
                                    @php
                                        $areaInfo = $selectedAreas[$i];
                                    @endphp
                                    <div class="dropzone draggable-dropzone--occupied" data-order="{{ $i }}"
                                        data-dropzone="1">
                                        <div class="item">
                                            <div class="area-card card bg-success" data-area-id="{{ $areaInfo->id }}">
                                                <div class="card-body">
                                                    {{ $areaInfo->nombre }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="dropzone" data-order="{{ $i }}" data-dropzone="1"></div>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col d-flex d-align-items-center justify-content-center">
                        <input id="id-form" type="hidden" value="{{ $form->id }}">
                        <button id="btn-save-form-areas" type="button" class="btn btn-info btn-lg mx-3">
                            Guardar Áreas y Continuar
                        </button>
                    </div>
                </div>
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
