@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">PADRES</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nombre:</strong> {{ $padre->user->name }}</p>
                    <p><strong>Correo:</strong> {{ $padre->user->email }}</p>
                    <p><strong>Edad:</strong> {{ $padre->edad }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Carnet de identidad:</strong> {{ $padre->ci }}</p>
                    <p><strong>Telefono:</strong> {{ $padre->telefono }}</p>
                    <p><strong>Direccion:</strong> {{ $padre->direccion }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group mt-2">
        <a href="{{ route('padres.edit', $padre) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('padres.index') }}" class="btn btn-danger">Cancelar</a>
    </div>

@stop
