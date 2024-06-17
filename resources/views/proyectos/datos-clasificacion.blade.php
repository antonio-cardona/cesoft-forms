@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Proyecto: {{ $proyecto->nombre }}</h1>
    <br>
    <h1>Datos de Clasificación</h1>
@stop

@section('content')
    <style>
        .item {
            height: 100%;
            cursor: grab;
        }

        .dropzone {
            height: 64px;
            margin-bottom: 7px;
        }

        .draggable-dropzone--occupied {
            background: #a3cbf0;
        }

        .order-labels {
            height: 64px;
            margin-bottom: 7px;
            padding: 12px;
        }

        .drag-identificacion {
            padding: 12px;
        }
    </style>

    <div class="container">
        <h4>Datos de Identificación</h4>
        <div class="row">
            <div class="col-sm-3">
                <h5>Disponibles:</h5>
                <div class="drag-identificacion border rounded-sm">
                    <div class="dropzone draggable-dropzone--occupied" data-dropzone="1">
                        <div class="item">
                            <div class="card bg-success">
                                <div class="card-body">
                                    Documento de Identidad
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dropzone draggable-dropzone--occupied" data-dropzone="1">
                        <div class="item">
                            <div class="card bg-success">
                                <div class="card-body">
                                    Número de Celular
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-1"></div>

            <div class="col-sm-6">
                <h5>Seleccionados:</h5>
                <div class="row">
                    <div class="col-sm-1">
                        <div class="order-labels">
                            <h1>1:</h1>
                        </div>
                        <div class="order-labels">
                            <h1>2:</h1>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="drag-identificacion border rounded-sm">
                            <div class="dropzone" data-order="1" data-dropzone="1"></div>
                            <div class="dropzone" data-order="2" data-dropzone="1"></div>
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
            <div class="col-sm-5">
                <h5>Disponibles:</h5>

                <div class="drag-identificacion border rounded-sm">
                    <div class="row row-cols-2">
                        @foreach ($cData as $cInfo)
                            <div class="col">
                                <div class="dropzone draggable-dropzone--occupied" data-dropzone="2">
                                    <div class="item">
                                        <x-classification-data-card :nombre="$cInfo->nombre" :id="$cInfo->id" />
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-sm-1"></div>

            <div class="col-sm-6">
                <h5>Seleccionados:</h5>

                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-sm-2">
                                @php
                                    $countData = count($cData);
                                    $secondHalf = (int) ($countData / 2);
                                    $firstHalf = $countData - $secondHalf;
                                @endphp
                                @for ($i = 1; $i <= $firstHalf; $i++)
                                <div class="order-labels">
                                    <h1>{{ $i }}:</h1>
                                </div>
                                @endfor
                            </div>
                            <div class="col-sm-10">
                                <div class="drag-identificacion border rounded-sm">
                                    @for ($i = 1; $i <= $firstHalf; $i++)
                                        <div class="dropzone" data-order="{{ $i }}" data-dropzone="2"></div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row">
                            <div class="col-sm-2">
                                @for ($j = $firstHalf + 1; $j <= $countData; $j++)
                                <div class="order-labels">
                                    <h1>{{ $j }}:</h1>
                                </div>
                                @endfor
                            </div>
                            <div class="col-sm-10">
                                <div class="drag-identificacion border rounded-sm">
                                    @for ($j = $firstHalf + 1; $j <= $countData; $j++)
                                        <div class="dropzone" data-order="{{ $j }}" data-dropzone="2"></div>
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
                <form action="{{ route("guardar-datos-clasificacion-proyecto", [$proyecto->id]) }}">
                    <input id="id-proyecto" type="hidden" value="{{ $proyecto->id }}">
                    <button id="btn-save-proyecto-classification-data" type="button" class="btn btn-info mx-3">Guardar Datos</button>
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
    @vite(['resources/js/admin/proyectos/datos-clasificacion.js'])
@stop
