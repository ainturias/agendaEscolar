 
@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Profesor</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nombre:</strong> {{ $profesor->user->name }}</p>
                    <p><strong>Correo:</strong> {{ $profesor->user->email }}</p> 
                    <p><strong>Edad:</strong> {{ $profesor->edad }}</p>
                    <p><strong>Direccion:</strong> {{ $profesor->direccion }}</p>
                    <p><strong>Telefono:</strong> {{ $profesor->telefono }}</p>

                </div>
                <div class="col-md-6">
                    <p><strong>materias:</strong></p>
                    <ul class="list-group">
                        @foreach ($profesor->materias as $materia)
                            <li class="list-group-item">
                                <strong>Nombre:</strong> {{ $materia->nombre }}<br>
                                <strong>Grupo:</strong> {{ $materia->grupo }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group mt-2">
        <a href="{{-- route('profesores.edit', $profesor) --}}" class="btn btn-primary">Editar</a>
        <a href="{{ route('profesores.index') }}" class="btn btn-danger">Cancelar</a>
    </div>

@stop
