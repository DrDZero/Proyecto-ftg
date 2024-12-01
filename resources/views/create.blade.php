<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <h1>Adición de juegos adicionales o nuevos, jugadores y nuevas partidas.</h1>
    <p><a href="{{ route('Juegos') }}">Indice</a></p>
    @if(Route::is('nuevoJuego')) <!--creacion de juegos nuevos-->
        <p>Adición de nuevos juegos de mesa</p>
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
            <input type="number" placeholder="J. Mins" name="jugadore_minimos">
            <input type="number" placeholder="J. Maxs" name="jugadore_maximos">
            <input type="text" placeholder="Descripción" name="descripcion">
            <input type="submit" value="Enviar">
        </form>
    @elseif(Route::is('nuevaPartida')) <!--creacion de partidas nuevas-->
        <p>Creación de partidas</p>
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
            <input type="number" placeholder="Jugadores" name="jugadores_partida">
            <input type="text" placeholder="Comentarios" name="comentario">
            <input type="submit" value="Enviar">
        </form>
    @endif
</body>
</html>