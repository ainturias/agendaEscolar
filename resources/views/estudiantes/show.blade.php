@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Estudiante</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nombre:</strong> {{ $estudiante->user->name }}</p>
                    <p><strong>Correo:</strong> {{ $estudiante->user->email }}</p>
                    <p><strong>Edad:</strong> {{ $estudiante->edad }}</p>
                    <p><strong>Tipo Sanguineo:</strong> {{ $estudiante->tipo_sanguineo }}</p>
                    <p><strong>Alergias:</strong> {{ $estudiante->alergias }}</p>
                    <p><strong>Curso:</strong> {{ $estudiante->curso->nombre }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Padres:</strong></p>
                    <ul class="list-group">
                        @foreach ($estudiante->padres as $padre)
                            <li class="list-group-item">
                                <strong>Nombre:</strong> {{ $padre->user->name }}<br>
                                <strong>Teléfono:</strong> {{ $padre->telefono }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group mt-2">
        <a href="{{ route('estudiantes.edit', $estudiante) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-danger">Cancelar</a>
    </div>

@stop
