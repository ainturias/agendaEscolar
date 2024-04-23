@extends('adminlte::page')

@section('title', 'Editar profesor')

@section('content_header')
    <h1>Editar profesor</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('profesores.update', $profesor->idU) }}">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="name" label="Nombre" type="text" value="{{ $profesor->user->name }}" />
            </div>
            <div class="col-md-6">
                <x-adminlte-input name="email" label="Correo Electrónico" type="email" value="{{ $profesor->user->email }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="edad" label="Edad" type="text" value="{{ $profesor->edad }}" />
            </div>
            <div class="col-md-6">
                <x-adminlte-input name="direccion" label="Dirección" type="text" value="{{ $profesor->direccion }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="telefono" label="Teléfono" type="text" value="{{ $profesor->telefono }}" />
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" />
                <a href="{{ route('profesores.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
@stop
