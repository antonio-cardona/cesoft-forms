@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mi Formulario</h1>
@stop

@section('content')

    <p>Vienvenido</p>

<div class="alert alert-success bg-primary" role="alert">
  <h4 class="alert-heading">Variable de Nivel Superior</h4>
  <p>Por favor, elija una de las tres opciones que aparecen en la pantalla para continuar.</p>
  <hr>
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">variable number 1</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="" class="btn btn-primary ">Seleciona</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">variable number 2</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="variable2" class="btn btn-primary ">Seleciona</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">variable number 3</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional contenido.</p>
        <a href="#" class="btn btn-primary">Seleciona</a>
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
    <script> console.log("Hi, I'm in Erfil!"); </script>
@stop
