@extends('adminlte::page')

@section('title', 'Editar Estudiante')

@section('content_header')
    <h1>Editar Estudiante</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('estudiantes.update', $estudiante->idU) }}">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="name" label="Nombre" type="text" value="{{ $estudiante->user->name }}" />
            </div>
            <div class="col-md-6">
                <x-adminlte-input name="email" label="Correo Electrónico" type="email" value="{{ $estudiante->user->email }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="edad" label="Edad" type="text" value="{{ $estudiante->edad }}" />
            </div>
            <div class="col-md-6">
                <x-adminlte-select name="tipo_sanguineo" label="Tipo Sanguíneo" value="{{ $estudiante->tipo_sanguineo }}" required>
                    <option disabled>Seleccione una opción</option>
                    <option value="A+" {{ $estudiante->tipo_sanguineo == 'A+' ? 'selected' : '' }}>A+</option>
                    <option value="A-" {{ $estudiante->tipo_sanguineo == 'A-' ? 'selected' : '' }}>A-</option>
                    <option value="B+" {{ $estudiante->tipo_sanguineo == 'B+' ? 'selected' : '' }}>B+</option>
                    <option value="B-" {{ $estudiante->tipo_sanguineo == 'B-' ? 'selected' : '' }}>B-</option>
                    <option value="AB+" {{ $estudiante->tipo_sanguineo == 'AB+' ? 'selected' : '' }}>AB+</option>
                    <option value="AB-" {{ $estudiante->tipo_sanguineo == 'AB-' ? 'selected' : '' }}>AB-</option>
                    <option value="O+" {{ $estudiante->tipo_sanguineo == 'O+' ? 'selected' : '' }}>O+</option>
                    <option value="O-" {{ $estudiante->tipo_sanguineo == 'O-' ? 'selected' : '' }}>O-</option>
                </x-adminlte-select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="alergias" label="Alergias" type="text" value="{{ $estudiante->alergias }}" />
            </div>
            <div class="col-md-6">
                <x-adminlte-select name="idCurso" label="Curso" required>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}" {{ $estudiante->curso && $estudiante->curso->id == $curso->id ? 'selected' : '' }}>
                            {{ $curso->nombre }}
                        </option>
                    @endforeach
                </x-adminlte-select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-select-bs id="padres" name="padres[]" label="Padres" label-class="text-black" multiple>
                    <x-slot name="appendSlot"></x-slot>
                    @foreach ($padres as $padre)
                        <option value="{{ $padre->user->id }}" {{ $estudiante->padres->contains('idU', $padre->user->id) ? 'selected' : '' }}>
                            {{ $padre->user->name }}
                        </option>
                    @endforeach
                </x-adminlte-select-bs>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" />
                <a href="{{ route('estudiantes.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
@stop
