@extends('adminlte::page')

@section('content_header')
<h1 class="m-0 text-dark">PROFESORES</h1>
@stop



@section('content')

{{-- Modal --}}
<div class="form-group align-items-end">
    <div class="d-inline-block mr-2">
        {{-- Botón para abrir el modal --}}
        <x-adminlte-button label="Registrar nuevo Profesor" class="bg-white" title="Registrar nuevo Profesor"
            data-toggle="modal" data-target="#modalpromocion" />
    </div>

    {{-- Modal --}}
    <x-adminlte-modal id="modalpromocion" title="Registrar Profesor" size="lg" theme="dark" v-centered static-backdrop
        scrollable>
        <form action="{{ route('profesores.store') }}" method="POST">
            {{-- CSRF Token --}}
            @csrf

            <x-adminlte-input name="name" type="text" label="Nombre" />
            <x-adminlte-input name="email" type="email" label="Correo Electrónico" />
            <x-adminlte-input name="edad" type="text" label="Edad" />
            <x-adminlte-input name="direccion" type="text" label="Dirección" />
            <x-adminlte-input name="telefono" type="text" label="Teléfono" />

            <x-adminlte-select2 id="materias2" name="materias2[]" label="Materias"
                                label-class="text-black" igroup-size="sm" multiple>

                                @foreach ($materiasDisponibles as $materia)
                                <option value="{{ $materia->id }}">{{ $materia->nombre }} {{ $materia->grupo }}</option>
                                @endforeach
            </x-adminlte-select2>

            {{-- Botones de acción --}}
            <div class="row mt-3">
                <div class="col-md-6">
                    <x-adminlte-button class="float-left" type="submit" label="Aceptar" theme="dark" />
                </div>
                <div class="col-md-6">
                    <x-adminlte-button class="float-right" type="button" label="Cancelar" theme="light"
                        data-dismiss="modal" />
                </div>
            </div>

            {{-- Slot para agregar contenido adicional en el footer --}}
            <x-slot name="footerSlot"></x-slot>
        </form>
    </x-adminlte-modal>

    <div class="d-inline-block"> {{-- Clase para alinear los botones en línea --}}
        <x-adminlte-button label="Importar Excel" title="Descripción del botón adicional" icon="fas fa-file-excel"
            data-toggle="modal" data-target="#modalImport" />
    </div>

    {{-- Modal Import--}}
    <x-adminlte-modal id="modalImport" title="Registrar Profesores" size="sm" theme="dark" v-centered static-backdrop
        scrollable>
        <form method="POST" action="{{route ('importarProfesores') }}" enctype="multipart/form-data">
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
                    <x-adminlte-button class="float-right" type="button" label="Cancelar" theme="light"
                        data-dismiss="modal" />
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


            @foreach($profesores as $profesor)
            <tr>

                <td>{{ $profesor->user->name }}</td>
                <td>{{ $profesor->user->email }}</td>
                <td>{{ $profesor->edad }}</td>
                <td>{{ $profesor->direccion }}</td>
                <td>{{ $profesor->telefono }}</td>


                <td width="15px">
                    <div class="d-flex">
                        {{-- esto es para el de editar membresía --}}
                        <a href="{{route('profesores.edit', $profesor->idU) }}"
                            class="btn btn-xs btn-default text-primary mx-1 shadow" title="EDITAR">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>

                        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="ELIMINAR"
                            data-toggle="modal" data-target="#modalCustom{{ $profesor->idU }}">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
                        <a href="{{ route('profesores.show', $profesor) }}"
                            class="btn btn-xs btn-default text-teal mx-1 shadow" title="DETALLES">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </a>
                        {{--
                        <script>
                            console.log(@json($profesor));
                        </script> --}}



                    </div>
                </td>

                <x-adminlte-modal id="modalCustom{{ $profesor->idU }}" title="Eliminar" size="sm" theme="warning"
                    icon="fa-solid fa-triangle-exclamation" v-centered static-backdrop scrollable>
                    <div style="height: 50px;">¿Está seguro de eliminar el profesor?</div>
                    <x-slot name="footerSlot">

                        <form action="{{ route('profesores.destroy', $profesor->idU)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <x-adminlte-button class="btn-flat" type="submit" label="Aceptar" theme="dark" />
                        </form>
                        <x-adminlte-button theme="light" label="Cancelar" data-dismiss="modal" />
                    </x-slot>
                </x-adminlte-modal>




                {{-- <div style="height:200px;"> --}}




            </tr>
            @endforeach

        </x-adminlte-datatable>

    </div>
</div>
@stop

@section('plugins.DatatablesPlugin', true)
@section('plugins.Datatables', true)
@section('plugins.Select2', true)

@section('css')
{{--
<link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.5.2-web/css/all.min.css')}}"> --}}
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