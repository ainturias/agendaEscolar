@extends('adminlte::page')

@section('content_header')
    <h1>Usuarios que vieron la tarea</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2>Visto:</h2>
                    <ul class="list-group">
                        @foreach ($usersWhoRead as $userR)
                            <li class="list-group-item bg-success">{{ $userR->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2>No visto:</h2>
                    <ul class="list-group">
                        @foreach ($usersWhoDidNotRead as $userDR)
                            <li class="list-group-item bg-danger">{{ $userDR->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
