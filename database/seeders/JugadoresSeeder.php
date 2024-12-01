<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jugador;

class JugadoresSeeder extends Seeder{
    public function run(): void{
        $jugador1=new Jugador;
        $jugador1->numero_jugador='1';
        $jugador1->nombre='Invitado1';
        $jugador1->puntos='0';
        $jugador1->activo=true;
        $jugador1->save();

        $jugador2=new Jugador;
        $jugador2->numero_jugador='2';
        $jugador2->nombre='Invitado2';
        $jugador2->puntos='0';
        $jugador2->activo=true;
        $jugador2->save();

        $jugador3=new Jugador;
        $jugador3->numero_jugador='3';
        $jugador3->nombre='Invitado3';
        $jugador3->puntos='0';
        $jugador3->activo=true;
        $jugador3->save();

        $jugador4=new Jugador;
        $jugador4->numero_jugador='4';
        $jugador4->nombre='Invitado4';
        $jugador4->puntos='0';
        $jugador4->activo=true;
        $jugador4->save();


        $jugador5=new Jugador;
        $jugador5->numero_jugador='5';
        $jugador5->nombre='Invitado5';
        $jugador5->puntos='0';
        $jugador5->activo=true;
        $jugador5->save();

        $jugador6=new Jugador;
        $jugador6->numero_jugador='6';
        $jugador6->nombre='Invitado6';
        $jugador6->puntos='0';
        $jugador6->activo=true;
        $jugador6->save();

        $jugador7=new Jugador;
        $jugador7->numero_jugador='7';
        $jugador7->nombre='Invitado7';
        $jugador7->puntos='0';
        $jugador7->activo=true;
        $jugador7->save();

        $jugador8=new Jugador;
        $jugador8->numero_jugador='8';
        $jugador8->nombre='Invitado8';
        $jugador8->puntos='0';
        $jugador8->activo=true;
        $jugador8->save();

        $jugador9=new Jugador;
        $jugador9->numero_jugador='9';
        $jugador9->nombre='Invitado9';
        $jugador9->puntos='0';
        $jugador9->activo=true;
        $jugador9->save();

        $jugador10=new Jugador;
        $jugador10->numero_jugador='10';
        $jugador10->nombre='Invitado10';
        $jugador10->puntos='0';
        $jugador10->activo=true;
        $jugador10->save();

    }
}
