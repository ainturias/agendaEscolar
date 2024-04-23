@extends('adminlte::page')

@section('title', 'Editar Padre')

@section('content_header')
    <h1>Editar Padre</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('padres.update', $padre->idU) }}">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <x-adminlte-input name="name" label="Nombre" type="text" value="{{ $padre->user->name }}" />
                    </div>
                    <div class="col-md-6">
                        <x-adminlte-input name="email" label="Correo Electrónico" type="email" value="{{ $padre->user->email }}" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <x-adminlte-input name="edad" label="Edad" type="text" value="{{ $padre->edad }}" />
                    </div>
                    <div class="col-md-6">
                        <x-adminlte-input name="ci" label="Carnet de Identidad" type="text" value="{{ $padre->ci }}" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <x-adminlte-input name="telefono" label="Teléfono" type="text" value="{{ $padre->telefono }}" />
                    </div>
                    <div class="col-md-6">
                        <x-adminlte-input name="direccion" label="Dirección" type="text" value="{{ $padre->direccion }}" />
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" />
                        <a href="{{ route('padres.index') }}" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
