@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Test de Conocimientos</h1>
@stop

@section('content')
<div class="container mt-1">
        <form action="" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3>Test de Conocimientos</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="question1" class="form-label">1. ¿Cuál es la capital de Francia?</label>
                        <input type="text" class="form-control" id="question1" name="question1" required>
                    </div>
                    <div class="mb-3">
                        <label for="question2" class="form-label">2. ¿Cuál es el símbolo químico del oro?</label>
                        <input type="text" class="form-control" id="question2" name="question2" required>
                    </div>
                    <div class="mb-">
                        <label for="question3" class="form-label">3. ¿En qué año llegó el hombre a la luna?</label>
                        <input type="text" class="form-control" id="question3" name="question3" required>
                    </div>
                    <div class="mb-3">
                        <label for="question4" class="form-label">4. ¿Quién escribió "Cien años de soledad"?</label>
                        <input type="text" class="form-control" id="question4" name="question4" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </form>
    </div>
        

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm in Erfil!"); </script>
@stop
