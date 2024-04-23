@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Anuncios</h1>
@stop

@section('content')

{{-- Modal --}}
<div class="form-group align-items-end">
    {{-- Botón para abrir el modal --}}
    <div class="d-inline-block mr-2"> {{-- Clase para alinear los botones en línea --}}
      <a href="{{ route('anuncios.create') }}" class="btn btn-white bg-white">Registrar nueva anuncio</a>
    </div>

</div>
{{-- Fin del Modal --}}



<div class="card">
    <div class="card-body">

        <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="white" with-buttons>


            @foreach($anuncios as $anuncio)
                <tr>

                        <td>{{ $anuncio->titulo }}</td>
                        <td>{{ $anuncio->contenido }}</td>
                        <td>{{ $anuncio->startDate }}</td>
                        <td width="15px">
                            <div class="d-flex">

                                {{-- esto es para el de editar membresía --}}
                                <a href="{{--route('anuncios.edit', $anuncio) --}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="EDITAR">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>

                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="ELIMINAR" data-toggle="modal" data-target="#modalCustom{{ $anuncio->id }}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                                <a href="{{ route('anuncioLeido', $anuncio) }}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="DETALLES">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </a>
                                {{-- <a href="{{ route('anuncios.show', $padre) }}" class="btn btn-xs btn-default text-info mx-1 shadow" title="HISTORIAL CLINICO">
                                    <i class="fa-solid fa-file-medical"></i>
                                </a> --}}
                                

                            </div>
                        </td>
                       
                        <x-adminlte-modal id="modalCustom{{ $anuncio->id }}" title="Eliminar" size="sm" theme="warning" icon="fa-solid fa-triangle-exclamation" v-centered static-backdrop scrollable>
                            <div style="height: 50px;">¿Está seguro de eliminar el padre?</div>
                            <x-slot name="footerSlot">
 
                                <form action="{{ route('anuncios.destroy', $anuncio->id)}}" method="POST">
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