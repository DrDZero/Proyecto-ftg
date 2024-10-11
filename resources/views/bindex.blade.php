<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Indice de los juegos disponibles.</h1>
    <h2>Listado:</h2>
    @forelse ( $board as $item)
        <li>{{$item}}</li>
    @empty
        <li>Vacio</li>
    @endforelse
    
</body>
</html>