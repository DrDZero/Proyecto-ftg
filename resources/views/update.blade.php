<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <form action="{{ route('updateJuego') }}" method="POST">
        @csrf
        <input type="hidden" name="juego_id" value="{{ $juego->id }}">
        <input type="text" placeholder="Nombre" name="name" value="{{ juego_id }}">
        <select name="juego_id" id="">
            <option value="{{ $juego->id }}"> {{ $juego->jugadores_minimos }} </option>
        </select>
        <select name="" id="">
            <option value="{{ $juego->id }}"> {{ $juego->jugadores_maximos }} </option>
        </select>
        <input type="text" placeholder="Descripción" name="descripcion" value="{{ juego_id }}">
        <input type="submit" value="Enviar">
    </form>