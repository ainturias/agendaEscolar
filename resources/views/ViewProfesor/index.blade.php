@extends('adminlte::page')

@section('title', 'Vista Profesor')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>MATERIAS</h1>
            <hr>
            <div class="row">
                @foreach ($materias as $materia)
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $materia->nombre }}</h3>

                                <h4>Grupo: {{ $materia->grupo }}</h4>
                            </div>
                            <div class="icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <a href=" {{ route('viewProfesor.show', $materia) }} " class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
