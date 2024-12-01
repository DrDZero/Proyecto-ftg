<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Juego;

class JuegosSeeder extends Seeder{
    public function run(): void    {
        $juego1=new Juego;
        $juego1->codigo="00000001";
        $juego1->nombre="Hive";
        $juego1->activo= true;
        $juego1->jugadores_minimos="2";
        $juego1->jugadores_maximos="2";
        $juego1->descripcion="Juego similar al ajedrez cuyo objetivo es reodear la reina del oponente.";
        $juego1->save();
        
        $juego2=new Juego;
        $juego2->codigo="00000002";
        $juego2->nombre="Exploding kittens";
        $juego2->activo= true;
        $juego2->jugadores_minimos="2";
        $juego2->jugadores_maximos="10";
        $juego2->descripcion="Juego party consistente en sobrevivir a los gatitos explosivos.";
        $juego2->save();
        
        $juego3=new Juego;
        $juego3->codigo="00000003";
        $juego3->nombre="Altered";
        $juego3->activo= true;
        $juego3->jugadores_minimos="2";
        $juego3->jugadores_maximos="2";
        $juego3->descripcion="Juego de construccion de mazos consistente en avanzar en la exploración, teniendo más nivel de exploracion en uno de los tres campos que el rival u oponente.";
        $juego3->save();

        $juego4=new Juego;
        $juego4->codigo="00000004";
        $juego4->nombre="Muffin Time";
        $juego4->activo= true;
        $juego4->jugadores_minimos="2";
        $juego4->jugadores_maximos="8";
        $juego4->descripcion="Juego party consistente en llegar a 10 cartas y aguantarlas hasta que te vuelva tocar.";
        $juego4->save();

        $juego5=new Juego;
        $juego5->codigo="00000005";
        $juego5->nombre="Dados ninja";
        $juego5->activo= true;
        $juego5->jugadores_minimos="2";
        $juego5->jugadores_maximos="5";
        $juego5->descripcion="Juego cuyo objetivo es conseguir monedas superando las pruebas y dificultando al jugador activo.";
        $juego5->save();

        $juego6=new Juego;
        $juego6->codigo="00000006";
        $juego6->nombre="Dados Zombie";
        $juego6->activo= true;
        $juego6->jugadores_minimos="2";
        $juego6->jugadores_maximos="20";
        $juego6->descripcion="Juego party cuyo objetivo es conseguir en las tiradas el mayor numero de cerebros evitando los disparos, los pasos se tiran de nuevo.";
        $juego6->save();

        $juego7=new Juego;
        $juego7->codigo="00000007";
        $juego7->nombre="Perdsidos en R´lyeh";
        $juego7->activo= false;
        $juego7->jugadores_minimos="2";
        $juego7->jugadores_maximos="6";
        $juego7->descripcion="Juego de tematica lovecraft en el cual se tiene que huir de una ciudad.";
        $juego7->save();

        $juego8=new Juego;
        $juego8->codigo="00000008";
        $juego8->nombre="Onitama";
        $juego8->activo=true;
        $juego8->jugadores_minimos="2";
        $juego8->jugadores_maximos="2";
        $juego8->descripcion="Elegante.";
        $juego8->save();
    }
}
