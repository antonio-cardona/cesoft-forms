@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Proyecto: {{ $proyecto->nombre }}</h1>
    <br>
    <h1>Datos de Clasificación</h1>
@stop

@section('content')
    <div class="container">
        <h4>Datos de Identificación</h4>
        <div class="row">
            <div class="col-sm-3">
                <h5>Disponibles:</h5>
                <div class="drag-identificacion border rounded-sm">
                    @php
                        $totalOccupiedDropZone = count($idData);
                    @endphp
                    @for ($i = 0; $i < $totalId; $i++)
                        @if ($i < $totalOccupiedDropZone)
                            @php
                                $idInfo = $idData[$i];
                            @endphp
                            <div class="dropzone draggable-dropzone--occupied" data-dropzone="1">
                                <div class="item">
                                    <div class="identification-card card bg-success"
                                        data-identification-data-id="{{ $idInfo->id }}">
                                        <div class="card-body">
                                            {{ $idInfo->nombre }}
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

            <div class="col-sm-1"></div>

            <div class="col-sm-6">
                <h5>Seleccionados:</h5>
                <div class="row">
                    <div class="col-sm-1">
                        @for ($i = 1; $i <= $totalId; $i++)
                            <div class="order-labels">
                                <h1>{{ $i }}:</h1>
                            </div>
                        @endfor
                    </div>
                    <div class="col-sm-6">
                        <div id="identification-selected-list" class="drag-identificacion border rounded-sm">
                            @php
                                $totalOccupiedDropZone = count($idDataSelected);
                            @endphp
                            @for ($i = 0; $i < $totalId; $i++)
                                @if ($i < $totalOccupiedDropZone)
                                    @php
                                        $idInfo = $idDataSelected[$i];
                                    @endphp
                                    <div class="dropzone draggable-dropzone--occupied" data-order="{{ $i + 1 }}"
                                        data-dropzone="1">
                                        <div class="item">
                                            <div class="identification-card card bg-success"
                                                data-identification-data-id="{{ $idInfo->id }}">
                                                <div class="card-body">
                                                    {{ $idInfo->nombre }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="dropzone" data-order="{{ $i + 1 }}" data-dropzone="1"></div>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-3"></div>
        </div>

        <h4>Datos de Clasificación</h4>
        <div class="row">
            <div class="col-sm-6">
                <h5>Disponibles:</h5>

                <div class="drag-identificacion border rounded-sm">
                    <div class="row row-cols-2">
                        @php
                            $totalOccupiedDropZone = count($cData);
                        @endphp
                        @for ($i = 0; $i < $totalCl; $i++)
                            @if ($i < $totalOccupiedDropZone)
                                @php
                                    $cInfo = $cData[$i];
                                @endphp
                                <div class="dropzone draggable-dropzone--occupied" data-dropzone="2">
                                    <div class="item">
                                        <x-classification-data-card :nombre="$cInfo->nombre" :id="$cInfo->id" />
                                    </div>
                                </div>
                            @else
                                <div class="dropzone" data-dropzone="2"></div>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <h5>Seleccionados:</h5>

                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-sm-2">
                                @php
                                    $secondHalf = (int) ($totalCl / 2);
                                    $firstHalf = $totalCl - $secondHalf;
                                @endphp
                                @for ($i = 1; $i <= $firstHalf; $i++)
                                    <div class="order-labels">
                                        <h1>{{ $i }}:</h1>
                                    </div>
                                @endfor
                            </div>
                            <div class="col-sm-10">
                                <div id="classification-selected-list" class="drag-identificacion border rounded-sm">
                                    @php
                                        $totalOccupiedDropZone = count($cDataSelected);
                                    @endphp
                                    @for ($i = 0; $i < $firstHalf; $i++)
                                        @if ($i < $totalOccupiedDropZone)
                                            @php
                                                $cInfo = $cDataSelected[$i];
                                            @endphp
                                            <div class="dropzone draggable-dropzone--occupied" data-order="{{ ($i + 1) }}" data-dropzone="2">
                                                <div class="item">
                                                    <x-classification-data-card :nombre="$cInfo->nombre" :id="$cInfo->id" />
                                                </div>
                                            </div>
                                        @else
                                            <div class="dropzone" data-order="{{ ($i + 1) }}" data-dropzone="2"></div>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row">
                            <div class="col-sm-2">
                                @for ($j = $firstHalf + 1; $j <= $totalCl; $j++)
                                    <div class="order-labels">
                                        <h1>{{ $j }}:</h1>
                                    </div>
                                @endfor
                            </div>
                            <div class="col-sm-10">
                                <div id="classification-selected-list-2" class="drag-identificacion border rounded-sm">
                                    @for ($j = $firstHalf; $j < $totalCl; $j++)
                                        @if ($j < $totalOccupiedDropZone)
                                            @php
                                                $cInfo = $cDataSelected[$j];
                                            @endphp
                                            <div class="dropzone draggable-dropzone--occupied" data-order="{{ ($j + 1) }}" data-dropzone="2">
                                                <div class="item">
                                                    <x-classification-data-card :nombre="$cInfo->nombre" :id="$cInfo->id" />
                                                </div>
                                            </div>
                                        @else
                                            <div class="dropzone" data-order="{{ ($j + 1) }}" data-dropzone="2"></div>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col d-flex d-align-items-center justify-content-center">
                <form action="{{ route('guardar-datos-clasificacion-proyecto', [$proyecto->id]) }}">
                    <input id="id-proyecto" type="hidden" value="{{ $proyecto->id }}">
                    <button id="btn-save-proyecto-classification-data" type="button" class="btn btn-info mx-3">
                        Guardar Datos
                    </button>

                    <button id="btn-cancelar" type="button" class="btn btn-secondary mx-3">
                        <i class="fas fa-window-close"></i> Cancelar
                    </button>
                </form>
            </div>
        </div>
    </div>

@stop

@section('css')
    @vite(['resources/sass/forms.scss'])
@stop

@section('js')
    @vite(['resources/js/admin/proyectos/datos-clasificacion.js'])
@stop
