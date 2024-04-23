@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    {{-- ----------------------------------------------- --}}

    {{-- <section class="bg-white py-8 lg:py-16 antialiased"> --}}
    {{-- <div class="container"> --}}
    <div class="card">
        <div class="card-body p-3"> {{-- jugan con style="width: 1000px;margin: 0 auto; para el ancho --}}
            <div class="mailbox-read-info">
                <h2><i class="fas fa-folder"></i> {{ $tarea->titulo }} </h2>
                <h4>Fecha de Finalización: {{ \Carbon\Carbon::parse($tarea->endDate)->format('d-m-Y') }}</h4>
            </div>



            <div style="margin-bottom: 300px;">
                <h3>Descripción:</h3>
                <p>{{ $tarea->descripcion }}</p>
            </div>

            <h3>Archivos:</h3>

            <div class="card-footer bg-white">
                <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
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
                            <a href="{{ asset('storage/' . $archivo->filepath) }}" class="btn btn-primary">Descargar</a>
                        </div>
                    @endforeach
                </ul>
            </div>
            <hr>

            {{-- PARTE DEL COMENTARIO VA AQUÍ --}}
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form action="{{ route('comentarios.update', $tarea->id) }}" method="POST"
                        enctype="multipart/form-data" class="mb-4">
                        @method('PUT')
                        @csrf
                        <label for="contenido" class="sr-only">Tu comentario</label>
                        <textarea id="contenido" name="contenido" class="form-control mb-4" rows="6" placeholder="Escribe un comentario"></textarea>
                        <button type="submit" class="btn btn-block btn-dark">Comentar</button>
                    </form>
                    {{-- Termina formulario para comentar --}}

                    @if ($comentarios != null)
                        @foreach ($comentarios as $comentario)
                            <article class="p-4 text-base bg-light rounded-lg mb-4">
                                <footer class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center">
                                        <p class="d-inline-flex align-items-center mr-3 text-sm text-dark font-weight-bold">
                                            <img class="mr-2 rounded-circle" style="width: 30px; height: 30px;"
                                                src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                                                alt="Michael Gough">
                                            {{ $comentario->usuario->name }}
                                        </p>
                                        <p class="text-sm text-secondary">
                                            <time pubdate datetime="2022-02-08" title="February 8th, 2022">
                                                {{ $comentario->created_at->diffForHumans() }}
                                            </time>
                                        </p>
                                    </div>
                                    @if (Auth::check() && $comentario->UserId == Auth::user()->id)
                                        <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#modalCustom{{ $comentario->id }}">Eliminar</button>
                                        {{-- -----------------MODAL------------------------- --}}
                                        <div class="modal fade" id="modalCustom{{ $comentario->id }}" tabindex="-1"
                                            aria-labelledby="modalCustomLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalCustomLabel">Eliminar</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Está seguro de eliminar su comentario?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('comentarios.destroy', $comentario->id) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Aceptar</button>
                                                        </form>
                                                        <button type="button" class="btn btn-light"
                                                            data-dismiss="modal">Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- -----------------MODAL------------------------- --}}
                                    @endif
                                </footer>
                                <p class="text-secondary">{{ $comentario->contenido }}</p>
                                <div class="d-flex align-items-center mt-4"></div>
                            </article>
                        @endforeach
                        <div class="d-flex justify-content-center">
                            {{ $comentarios->links() }}
                        </div>
                    @endif
                </div>
            </div>
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
