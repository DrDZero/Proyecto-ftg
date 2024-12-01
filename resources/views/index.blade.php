<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <h1>Indice de los juegos disponibles.</h1>
    <p><a href="{{ route('nuevaPartida') }}">Nueva partida  </a><a href="{{ route('nuevoJuego') }}"> Añadir juego</a></p>
    <h2>Listado:</h2>
    <table>
        <head>
            <tr>
                <th>NOMBRE</th>
                <th>J. MAX.</th>
                <th>J. MIN.</th>
                <th>DESCRIPCIÓN</th>
                <th>DISPONIBLE</th>
            </tr>
        </head>
        <body
            @forelse ($juegos as $juego)
            <tr>
                <th> {{ $juego->nombre }}</th>
                <th> {{ $juego->jugadores_minimos }} </th>
                <th> {{ $juego->jugadores_maximos }} </th>
                <th> {{ $juego->descripcion }} </th>
                <th>
                    @if ($juego->activo)
                        <span style="color: greenyellow">Disponible</span>
                    @else
                        <span style="color: pink">No disponible</span>
                    @endif
                </th>
            </tr>
            @empty
            <tr>
                <th>Sin juegos de mesa aún</th>
            </tr>
            @endforelse
        </body>
    </table>
</body>
</html>