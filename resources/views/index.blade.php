<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ind3x</title>
    <style>
        body{
            background-color: royalblue;
            background-image: url('/img/mesa y sillas.jpg');
            background-repeat:no-repeat;
            background-position:top;
            background-size: 100vh;
            z-index: -3;
        }
    </style>
</head>
<body>
    <div style="background-color: royalblue" style="width: max-content">
    @if(Route::is('Juegos')) <!--lista de juegos-->
        <h1>Índice de los juegos disponibles.</h1>
        <p><button class="btn btn-primary"> <a href="{{ route('home') }}">HOME</a></button></p>
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
                            <span style="color: rgb(255, 141, 47)">Disponible</span>
                        @else
                            <span style="color: rgb(65, 7, 17)">No disponible</span>
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
    @elseif(Route::is('Jugadores')) <!--lista de jugadores-->
        <h1>Índice de los jugadores actuales.</h1>
        <p><button class="btn btn-primary"> <a href="{{ route('home') }}">HOME</a></button></p>
        <h2>Listado:</h2>
        <table>
            <head>
                <tr>
                    <th>Nº JUGADOR</th>
                    <th>NOMBRE</th>
                    <th>PUNTOS</th>
                    <th>¿ACTIVO?</th>
                </tr>
            </head>
            <body>
                @forelse ($jugadores as $jugador )
                    <tr>
                        <th> {{ $jugador->numero_jugador }} </th>
                        <th> {{ $jugador->nombre }} </th>
                        <th> {{ $jugador->puntos }} </th>
                        <th> 
                            @if ($jugador -> activo)
                                <span style="color: royalblue">Está</span>
                            @else
                                <span style="color: red">No está</span>
                            @endif
                        </th>
                    </tr>
                @empty
                    <tr>
                        <th>Sin jugadores actuales.</th>
                    </tr>
                @endforelse
            </body>
        </table>
    @elseif (Route::is('Partidas')) <!--lista de partidas-->
        <h1>Índice de las partidas guardadas.</h1>
        <p><button class="btn btn-primary"> <a href="{{ route('home') }}">HOME</a></button></p>
        <h2>Listado:</h2>
        <table>
            <head>
                <tr>
                    <th>NOMBRE</th>
                    <th>FECHA</th>
                    <th>JUEGO</th>
                    <th>Nº J.</th>
                    <th>COMENTARIO/S</th>
                </tr>
            </head>
            <body>
                @forelse ($partidas as $partida )
                    <tr>
                        <th> {{ $partida -> nombre }} </th>
                        <th> {{ $partida -> fecha }} </th>
                        <th> {{ $partida -> juego }} </th>
                        <th> {{ $partida -> jugadores_partida }} </th>
                        <th> {{ $partida -> comentario }} </th>
                    </tr>
                    @empty
                    <tr>
                        <th>Sin partidas por ahora.</th>
                    </tr>
                @endforelse
            </body>
        </table>
    @endif
</div>
</body>
</html>