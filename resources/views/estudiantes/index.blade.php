@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Estudiantes</h1>
@stop

 

@section('content')


{{-- Modal --}}
<div class="form-group align-items-end">
    {{-- Botón para abrir el modal --}}
    <div class="d-inline-block mr-2"> {{-- Clase para alinear los botones en línea --}}
        <x-adminlte-button label="Registrar nuevo Estudiante" class="bg-white" title="Registrar nuevo paciente"
            data-toggle="modal" data-target="#modalpromocion" />
    </div>


    {{-- Modal Registrar nuevo Estudiante--}}
    <x-adminlte-modal id="modalpromocion" title="Registrar Estudiante" size="lg" theme="dark" v-centered static-backdrop scrollable>    
        <form action="{{ route('estudiantes.store') }}" method="POST">
            @method('POST')
            @csrf  
            {{-- Campos del formulario --}}
            <x-adminlte-input name="name" type="text" label="Nombre" />
            <x-adminlte-input name="email" type="email" label="Correo Electrónico"/>
            <x-adminlte-input name="edad" type="text" label="Edad"/>
            <x-adminlte-select name="tipo_sanguineo" label="Tipo Sanguíneo" required>
                <option disabled>Seleccione una opción</option>
                <option value="A+" selected>A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </x-adminlte-select>
            <x-adminlte-input name="alergias" type="text" label="Alergias" />
            <x-adminlte-select name="idCurso" id="idCurso" label="Curso" required>
                @foreach ($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                @endforeach
            </x-adminlte-select>

            {{-- Select de padres --}}
            @php
                $config = [
                    "liveSearch" => true,
                    "liveSearchPlaceholder" => "Buscar...",
                    "showTick" => true,
                    "actionsBox" => true,
                ];
            @endphp
            <x-adminlte-select-bs id="padres" name="padres[]" label="Padres"
                label-class="text-black"  :config="$config" multiple>
                <x-slot name="appendSlot"></x-slot>
                @foreach ($padres as $padre)
                    <option value="{{ $padre->user->id }}">{{ $padre->user->name }}</option>
                @endforeach
            </x-adminlte-select-bs>

            {{-- Botones de acción --}}
            <div class="row mt-3">
                <div class="col-md-6">
                    <x-adminlte-button class="float-left" type="submit" label="Aceptar" theme="dark" />   
                </div>
                <div class="col-md-6">
                    <x-adminlte-button class="float-right" type="button" label="Cancelar" theme="light" data-dismiss="modal" />
                </div>
            </div>

            {{-- Slot para agregar contenido adicional en el footer --}}
            <x-slot name="footerSlot"></x-slot>
        </form>
    </x-adminlte-modal>



    {{-- Botón import --}}
    <div class="d-inline-block"> {{-- Clase para alinear los botones en línea --}}
        <x-adminlte-button label="Importar Excel"  title="Descripción del botón adicional" icon="fas fa-file-excel" 
        data-toggle="modal" data-target="#modalImport"/>
    </div>
    {{-- Modal Import--}}
    <x-adminlte-modal id="modalImport" title="Registrar Estudiante" size="sm" theme="dark" v-centered static-backdrop scrollable>    
            <form method="POST" action="{{route ('importarEstudiantes') }}"  enctype="multipart/form-data">
                @csrf  
                <h5>import CSV</h5>
                {{-- Campos del formulario --}}
                <input type="file" name="document_csv" class="form-control">

                {{-- Botones de acción --}}
                <div class="row mt-3">
                    <div class="col-md-6">
                        <x-adminlte-button class="float-left" type="submit" label="Aceptar" theme="dark" />   
                    </div>
                    <div class="col-md-6">
                        <x-adminlte-button class="float-right" type="button" label="Cancelar" theme="light" data-dismiss="modal" />
                    </div>
                </div> 
                {{-- Slot para agregar contenido adicional en el footer --}}
                <x-slot name="footerSlot"></x-slot>

            </form>
    </x-adminlte-modal>






</div>
{{-- Fin del Modal --}}







<div class="card">
    <div class="card-body">

        <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="white" with-buttons>


            @foreach($estudiantes as $estudiante)
                <tr>

                        <td>{{ $estudiante->user->name }}</td>
                        <td>{{ $estudiante->user->email }}</td>
                        <td>{{ $estudiante->edad }}</td>
                        <td>{{ $estudiante->tipo_sanguineo }}</td>
                        <td>{{ $estudiante->alergias }}</td>
                        <td>{{ $estudiante->curso->nombre ?? 'Sin asignar' }}</td>
                        <td width="15px">
                            <div class="d-flex">

                                {{-- esto es para el de editar membresía --}}
                                <a href="{{route('estudiantes.edit', $estudiante) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="EDITAR">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>

                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="ELIMINAR" data-toggle="modal" data-target="#modalCustom{{ $estudiante->idU }}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                                <a href="{{ route('estudiantes.show', $estudiante) }}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="DETALLES">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </a>
  
                                

                            </div>
                        </td>
                       
                        <x-adminlte-modal id="modalCustom{{ $estudiante->idU }}" title="Eliminar" size="sm" theme="warning" icon="fa-solid fa-triangle-exclamation" v-centered static-backdrop scrollable>
                            <div style="height: 50px;">¿Está seguro de eliminar el padre?</div>
                            <x-slot name="footerSlot">
 
                                <form action="{{ route('estudiantes.destroy', $estudiante->idU)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <x-adminlte-button class="btn-flat" type="submit" label="Aceptar" theme="dark" />
                                </form>
                                <x-adminlte-button theme="light" label="Cancelar" data-dismiss="modal" />
                            </x-slot>
                        </x-adminlte-modal>
                 
                </tr>
            @endforeach
         
        </x-adminlte-datatable>

    </div>
</div>
@stop

@section('plugins.DatatablesPlugin', true)
@section('plugins.Datatables', true)
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.5.2-web/css/all.min.css')}}"> --}}
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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

            @if (session('error'))
            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}'
            });
            @endif
            
            // $('.swalDefaultError').click(function() {
            // Toast.fire({
            //     icon: 'error',
            //     title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            // })
            // });
            // $('.swalDefaultWarning').click(function() {
            // Toast.fire({
            //     icon: 'warning',
            //     title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            // })
            // });
            // $('.swalDefaultQuestion').click(function() {
            // Toast.fire({
            //     icon: 'question',
            //     title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            // })
            // });
        });

    </script>
@stop