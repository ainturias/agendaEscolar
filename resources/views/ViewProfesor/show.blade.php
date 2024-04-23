@extends('adminlte::page')

@section('title', 'Alumnos')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h2>LISTA DE ESTUDIANTES</h2>
            <hr>
            <div class="row">
                @php
                    $id = 1;
                @endphp
                @foreach ($estudiantes as $estudiante)
                    <div class="w-100 mb-3">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5>{{ $id }}</h5>
                                    <h5>{{ $estudiante->user->name }}</h5>
                                    <h5>{{ $estudiante->user->email }}</h5>
                                    <h5>{{ $estudiante->edad }}</h5>
                                    <h5>{{ $estudiante->tipo_sanguineo }}</h5>
                                    <h5>{{ $estudiante->alergias }}</h5>
                                    <h5> 
                                        @foreach ($estudiante->padres as $padre)
                                            {{ $padre->user->name }}
                                            -
                                            {{ $padre->telefono }} 
                                            <br>
                                        @endforeach
                                    </h5>
                                </div>
                                @php
                                    $id++;
                                @endphp
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
