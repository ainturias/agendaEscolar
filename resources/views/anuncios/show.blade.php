@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Anuncio</h1>
@stop

@section('content')
    {{-- ----------------------------------------------- --}}

    {{-- <section class="bg-white py-8 lg:py-16 antialiased"> --}}
    {{-- <div class="container"> --}}
    <div class="card">
        <div class="card-body p-3"> {{-- jugan con style="width: 1000px;margin: 0 auto; para el ancho --}}
            <div class="mailbox-read-info">
                <h2><i class="fas fa-folder"></i> {{ $anuncio->titulo }} </h2>
                <h4>Fecha de Finalización: {{ \Carbon\Carbon::parse($anuncio->endDate)->format('d-m-Y') }}</h4>
            </div>

            <div style="margin-bottom: 300px;">
                <h3>Descripción:</h3>
                <p>{{ $anuncio->contenido }}</p>
            </div>

            <h3>Archivos:</h3>

            <div class="card-footer bg-white">
                <div class="mailbox-attachments d-flex align-items-stretch clearfix">
                    @foreach ($archivos as $archivo)
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center">
                                <!-- Icono o imagen según el tipo de archivo -->
                                @if (Str::endsWith($archivo->filename, '.pdf'))
                                    <i class="fas fa-file-pdf fa-3x"></i>
                                @elseif (Str::endsWith($archivo->filename, ['.doc', '.docx']))
                                    <i class="fas fa-file-word fa-3x"></i>
                                @elseif (Str::endsWith($archivo->filename, ['.xls', '.xlsx']))
                                    <i class="fas fa-file-excel fa-3x"></i>
                                @elseif (Str::endsWith($archivo->filename, ['.jpg', '.jpeg', '.png', '.gif']))
                                    <img src="{{ asset('storage/' . $archivo->filepath) }}" alt="{{ $archivo->filename }}"
                                        style="width: 50px; height: 50px;">
                                @else
                                    <i class="fas fa-file fa-lg"></i>
                                @endif
                                <!-- Nombre del archivo -->
                                <h3 class="ml-2">{{ $archivo->filename }}</h3>
                            </div>
                            <!-- Botón de descarga -->
                            <a href="{{ asset('storage/' . $archivo->filepath) }}" class="btn btn-primary" download>Descargar</a>
                        </div>
                    @endforeach
                </div>
            </div>
            <hr>

        </div>
    </div>
    {{--
    </div> --}}




    {{--
</section> --}}

@stop


@section('css')

@stop

@section('js')

@stop
