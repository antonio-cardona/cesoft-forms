@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Datos de Identificación.</h1>
@stop

@section('content')
<div class="d-flex justify-content-center mt-1  ">
        <div class="col-md-6 col-lg-4">
            <form action="" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3>Datos Personales</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-1">
                            <label for="Nacionalidad" class="form-label">Nacionalidad</label>
                            <input type="text" class="form-control" id="text" name="text" required>
                        </div>
                        <div class="mb-1">
                            <label for="Genero" class="form-label">Genero</label>
                              <select class="form-control" id="exampleFormControlSelect1">
                                <option>Femenino</option>
                                <option>Masculino</option>
                                <option>otros</option>
                              </select>
                        </div>
                        <div class="mb-1">
                            <label for="Lugas-de-estudios" class="form-label">Lugas de estudios</label>
                            <input type="text" class="form-control" id="text" name="text" required>
                        </div>
                        <div class="mb-1">
                            <label for="documento_identidad" class="form-label">Doc. Identidad</label>
                            <input type="number" class="form-control" id="documento_identidad" name="documento_identidad" required>
                        </div>
                        <div class="mb-1">
                            <label for="edad" class="form-label">Edad</label>
                            <input type="number" class="form-control" id="edad" name="edad" required>
                        </div>
                        <div class="mb-1">
                            <label for="celular" class="form-label"># Celular</label>
                            <input type="tel" class="form-control" id="celular" name="celular" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Comentarios</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </form>
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
