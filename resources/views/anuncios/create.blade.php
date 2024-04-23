@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Subir Anuncio</h1>
@stop
@section('plugins.TempusDominusBs4', true)
@section('content')



{{-- ---Custom crear-- --}}
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="form-group">
          <form action="{{ route('storeAnuncio') }}" method="POST" enctype="multipart/form-data">
            @method('POST') {{-- Utilizamos el método PUT para actualizar el recurso --}}
            @csrf
  
            <div class="modal-body">
              <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" class="form-control" id="titulo">
              </div>
              <div class="form-group">
                <label for="contenido">Contenido</label>
                <x-adminlte-textarea name="contenido" placeholder="Insertar descripcion..." rows=4 id="contenido"/>
              </div>
  
              <label for="archivo">Archivos</label>
              <input type="file" name="image" id="image" multiple credits="false">
              @php
              $config = ['format' => 'YYYY-MM-DD'];
              @endphp
              <label for="fecha">fecha</label>
              <x-adminlte-input-date name="fecha" :config="$config"/>



             
             
            <div class="form-group">
                <label for="destinatario">Destinatario</label>
                <select name="destinatario" id="destinatario" class="form-control">
                    <option value="curso">Curso</option>
                    <option value="materia">Materia</option>
                    <option value="estudiante">Estudiante</option>
                    <option value="padre">Padre</option>
                    <option value="colegio">Todo el Colegio</option>
                </select>
            </div>
    
            <div class="form-group" id="select-curso" style="display:none;">
                <label for="curso">Curso</label>
                <select name="curso" id="curso" class="form-control">
                    @foreach ( $cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" id="select-materia" style="display:none;">
                <label for="materia">Materia</label>
                <select name="materia" id="materia" class="form-control">
                    @foreach ( $materias as $materia )
                    <option value="{{ $materia->id }}">{{ $materia->nombre }} {{$materia->grupo}}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="form-group" id="select-estudiante" style="display:none;">
                <label for="estudiante">Estudiante</label>
                <select name="estudiante" id="estudiante" class="form-control">
                    @foreach ( $estudiantes as $estudiante )
                    <option value="{{ $estudiante->user->id }}">{{ $estudiante->user->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group" id="select-padre" style="display:none;">
                <label for="padre">Estudiante</label>
                <select name="padre" id="padre" class="form-control">
                    @foreach ( $padres as $padre )
                    <option value="{{ $padre->user->id }}">{{ $padre->user->name }}</option>
                    @endforeach
                </select>
            </div>
             


  
  
            </div>     
            <button type="submit" class="btn btn-primary float-left mt-3">Guardar</button>
            <button type="button" class="btn btn-secondary float-right mt-3" data-dismiss="modal">Cerrar</button>
  
          </form>
        </div>
      </div>
    </div>
  </div>











  
@stop

@section('css')
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@stop

@section('js')
<script>
    // Manejar la visibilidad de los campos de selección según el destinatario seleccionado
    document.getElementById('destinatario').addEventListener('change', function() {
        var destinatario = this.value;

        // Ocultar todos los campos de selección
        document.getElementById('select-curso').style.display = 'none';
        document.getElementById('select-materia').style.display = 'none';
        document.getElementById('select-estudiante').style.display = 'none';
        document.getElementById('select-padre').style.display = 'none';

        // Mostrar el campo de selección correspondiente al destinatario seleccionado
        switch (destinatario) {
            case 'curso':
                document.getElementById('select-curso').style.display = 'block';
                break;
            case 'materia':
                document.getElementById('select-materia').style.display = 'block';
                break;
            case 'estudiante':
                document.getElementById('select-estudiante').style.display = 'block';
                break;
            case 'padre':
                document.getElementById('select-padre').style.display = 'block';
                break;
            default:
                break;
        }
    });
</script>
 
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

<script>
    $(function() {
        var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
        });
        @if (session('success'))
        Toast.fire({
            icon: 'success',
            title: '{{ session('success') }}'
        });
        @endif
         
        @if (session('deleted'))
        Toast.fire({
            icon: 'info',
            title: '{{ session('deleted') }}'
        });
        @endif
        

    });
</script>
 @stop
