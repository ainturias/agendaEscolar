@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Tarea</h1>
@stop
@section('plugins.TempusDominusBs4', true)
@section('content')

{{-- ---Custom crear-- --}}
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="form-group">
          <form action="{{ route('tareas.update', $tarea->id) }}" method="POST" enctype="multipart/form-data">
           {{-- Utilizamos el método PUT para actualizar el recurso --}}
           @method('PUT')
            @csrf
  
            <div class="modal-body">
              <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" class="form-control" id="titulo" value="{{ $tarea->titulo }}">
              </div>
              <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <x-adminlte-textarea name="descripcion" placeholder="Insertar descripcion..." rows=4 id="descripcion" va>{{ $tarea->descripcion }}</x-adminlte-textarea>
              </div>
  
              <label for="archivo">Archivos</label>
              <input type="file" name="image" id="image" multiple credits="false">
              @php
              $config = ['format' => 'YYYY-MM-DD'];
              @endphp
              <label for="fechaPresentacion">fecha Presentacion</label>
              <x-adminlte-input-date name="fechaPresentacion" :config="$config" value="{{ $tarea->startDate }}"/>
  
              <label for="materia">Materia</label>
              <x-adminlte-select-bs name="materiaId" id="materiaId">
                @foreach ($materias as $materia)
                <option value="{{$materia->id}}" @if($materia->id == $tarea->materiaId) selected @endif>{{$materia->nombre}} {{$materia->grupo}}</option>
                @endforeach
              </x-adminlte-select-bs>
  
            </div>     
            <button type="submit" class="btn btn-primary float-left mt-3">Guardar</button>
            <a href="{{ route('tareas.index') }}"class="btn btn-secondary float-right mt-3">Cancelar</a>
  
          </form>
        </div>
      </div>
    </div>
  </div>


 
  
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@stop

@section('js')
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);

        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]');
    
        // Create a FilePond instance
        const pond = FilePond.create(inputElement);



        FilePond.setOptions({
            server: {
                process: '/upload',
                revert: '/delete',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            },
        });
    </script>

 
 @stop