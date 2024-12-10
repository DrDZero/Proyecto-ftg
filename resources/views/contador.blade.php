@extends('adminlte::page')

@section('title', 'Contadores')

@section('content_header')
    <h1>Contadores personalizables</h1>
@stop

@section('content')
    <h1>Contadores</h1>
    {{--trigger del modal--}}
    <div class="row">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newContador">Nuevos contadores</button>
    </div>
    {{--modal--}}
    <div class="modal fade" id="newContador" tabindex="-1" role="dialog" aria-labelledby="newContadorLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newContadorLabel">Contadores nuevos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('storeContador') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="ContadorANombre">Contador A</label>
                            <input type="text" class="form-control" name="contadorA" id="contadorAName" placeholder="Nombre del contador A" required>
                        </div>
                        <div class="form-group">
                            <label for="ContadorBNombre">Contador B</label>
                            <input type="text" class="form-control" name="contadorB" id="contadorBName" placeholder="Nombre del contador B" required>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                            <button type="submit" class="btn btn-primary">Guardar contadores</button>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
    <table class="table">
        <thead><tr>
            <th scope="col">#</th>
            <th scope="col">ContadorA</th>
            <th scope="col">ContadorB</th>
            <th scope="col">Valor del A</th>
            <th scope="col">Valor del B</th>
            <th scope="col">Fecha</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($contadores as $contador)
            <tr>
            <th scope="row"> {{ $contador->id }} </th>
            <td> {{ $contador->contadorA }} </td>
            <td> {{ $contador->contadorB }} </td>
            <td> {{ $contador->contadA }}</td>
            <td> {{ $contador->contadB }}</td>
            <td> {{ $contador->created_at }}</td>
            <td>
                <a href="{{ route('viewContador', $contador)}}" class="btn btn-success">Ver</a>
                <a href="{{ route('destroyContador', $contador)}}" class="btn btn-danger">Eliminar</a>
            </td>
            </tr>
        @empty
            <tr><th colspan="7" style="text-align: center">Vacio?</th></tr>
        @endforelse
        </tbody>
    </table>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop