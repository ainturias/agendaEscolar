@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Padres</h1>
@stop

 

@section('content')

{{-- @if (session('mensaje'))
<div class="swalDefaultWarning">
    <strong>{{ session('mensaje') }}</strong>
</div>
@endif --}}

{{-- modal --}}
<div class="form-group align-items-end">

    <div class="d-inline-block mr-2">
        {{-- boton llamada crear --}}
        <x-adminlte-button label="Registrar nuevo Padre" class="bg-white" title="Registrar nuevo paciente"
        data-toggle="modal" data-target="#modalpromocion" />
    </div>
        {{-- ---modal crear-- --}}
        <x-adminlte-modal id="modalpromocion" title="Registrar paciente" size="lg" theme="dark" v-centered static-backdrop scrollable>    
            <form action="{{ route('padres.store') }}" method="POST">
                        @method('POST')
                        @csrf  
                                <x-adminlte-input name="name" type="text" label="nombre" />
                                <x-adminlte-input name="email" type="email" label="correo electronico"/>
                                <x-adminlte-input name="edad" type="text" label="edad"/>
                                <x-adminlte-input name="ci" type="text" label="carnet de identidad"/>
                                <x-adminlte-input name="telefono" type="text" label="telefono" />
                                <x-adminlte-input name="direccion" type="text" label="direccion" />
                                <x-adminlte-button  class="float-left mt-3" type="submit" label="Aceptar" theme="dark" />   
                                <x-adminlte-button  class="btn btn-primary float-right mt-3" theme="light" label="Cancelar" data-dismiss="modal" />
                                <x-slot name="footerSlot" >
                                </x-slot>                   
            </form>
        </x-adminlte-modal>

    <div class="d-inline-block"> {{-- Clase para alinear los botones en línea --}}
        <x-adminlte-button label="Importar Excel"  title="Descripción del botón adicional" icon="fas fa-file-excel" 
        data-toggle="modal" data-target="#modalImport"/>
    </div>


    {{-- Modal Import--}}
     <x-adminlte-modal id="modalImport" title="Registrar Padres" size="sm" theme="dark" v-centered static-backdrop scrollable>    
            <form method="POST" action="{{route ('importarPadres') }}"  enctype="multipart/form-data">
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
{{-- modal --}}



<div class="card">
    <div class="card-body">

        <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="white" with-buttons>


            @foreach($padres as $padre)
                <tr>

                        <td>{{ $padre->user->name }}</td>
                        <td>{{ $padre->user->email }}</td>
                        <td>{{ $padre->edad }}</td>
                        <td>{{ $padre->ci }}</td>
                        <td>{{ $padre->telefono }}</td>
                        <td>{{ $padre->direccion }}</td>
                        <td width="15px">
                            <div class="d-flex">

                                {{-- esto es para el de editar membresía --}}
                                <a href="{{route('padres.edit', $padre) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="EDITAR">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>

                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="ELIMINAR" data-toggle="modal" data-target="#modalCustom{{ $padre->idU }}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                                <a href="{{ route('padres.show', $padre) }}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="DETALLES">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </a>

                                

                            </div>
                        </td>
                       
                        <x-adminlte-modal id="modalCustom{{ $padre->idU }}" title="Eliminar" size="sm" theme="warning" icon="fa-solid fa-triangle-exclamation" v-centered static-backdrop scrollable>
                            <div style="height: 50px;">¿Está seguro de eliminar el padre?</div>
                            <x-slot name="footerSlot">
 
                                <form action="{{ route('padres.destroy', $padre->idU)}}" method="POST">
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