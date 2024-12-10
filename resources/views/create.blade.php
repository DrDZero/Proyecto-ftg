<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New</title>
    <style>
        body{
            background-color: royalblue;
            background-image: url('/img/logo.png');
            background-repeat:no-repeat;
            background-position:top;
            background-size: 100vh;
            z-index: -3;
        }
    </style>
</head>
<body>
    <div>{{-- style="background-color: royalblue">--}}
        @if(Route::is('nuevoJuego')) <!--creacion de juegos nuevos-->
            <h1>Adición de nuevos juegos de mesa</h1>
            <p><button class="btn btn-primary"><a href="{{ route('Juegos') }}">Índice</a></button></p>
            <form action="{{ route('storeJuego') }}" method="POST">
                @csrf
                <input type="number" placeholder="Código" name="codigo">
                @error('codigo')
                    {{ $message }}
                @enderror
                <input type="text" placeholder="Nombre" name="nombre">
                @error('nombre')
                {{ $message }}
                @enderror
                <input type="number" placeholder="J. Mins" name="jugadores_minimos" value="1">
                <input type="number" placeholder="J. Maxs" name="jugadores_maximos" value="1">
                <input type="text" placeholder="Descripción" name="descripcion">
                <input type="submit" value="Enviar">
                <p><button class="btn btn-primary"> <a href="{{ route('home') }}">Cancelar</a></button></p>
            </form>
        @elseif(Route::is('nuevaPartida')) <!--creacion de partidas nuevas-->
            <h1>Creación de partidas</h1>
            <p><button class="btn btn-primary"><a href="{{ route('Partidas') }}">Índice</a></button></p>
            <form action="{{ route('storePartida') }}" method="POST">
                @csrf
                <input type="number" placeholder="Código" name="codigo">
                @error('codigo')
                    {{ $message }}
                @enderror
                <input type="text" placeholder="Nombre" name="nombre">
                @error('nombre')
                {{ $message }}
                @enderror
                <input type="date" placeholder="Fecha" name="fecha">
                <select name="juego_id" id="">
                    <option value="Juego" disabled selected>Juego</option>
                    @foreach ($juegos as $juego)
                        <option value=" {{ $juego->id }} ">{{ $juego->nombre }}</option>
                    @endforeach
                </select>
                <input type="number" placeholder="Jugadores" name="jugadores_partida" value="2">
                @error('jugadores_partida')
                    {{ $message }}
                @enderror
                <input type="text" placeholder="Comentarios" name="comentario">
                <input type="submit" value="Enviar">
                <p><button class="btn btn-primary"> <a href="{{ route('home') }}">Cancelar</a></button></p>
            </form>
        @elseif(Route::is('nuevoJugador')) <!--creacion de jugadores nuyevos-->
            <h1>Adición de jugadores</h1>
            <p><button class="btn btn-primary"><a href="{{ route('Jugadores') }}">Índice</a></button></p>
            <form action="{{ route('storeJugador') }}" method="POST">
                @csrf
                <input type="number" placeholder="Número de jugador" name="numero_jugador">
                @error('numero_jugador')
                    {{ $message }}
                @enderror
                <input type="text" placeholder="Nombre del jugador" name="nombre">
                @error('nombre')
                    {{ $message }}
                @enderror
                <input type="submit" value="Enviar">
                <p><button class="btn btn-primary"> <a href="{{ route('home') }}">Cancelar</a></button></p>
            </form>
        @endif
    </div>
    <div style="background-image: url('/img/logo.png')"></div>
</body>
</html>