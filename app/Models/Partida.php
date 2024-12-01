<?php

namespace App\Models;

use App\Helpers\ItemListado;
use App\Traits\Listable;
use Carbon\Carbon;
use Illuminate\Support\Fcades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class Partida extends Model{
    use Listable;

    protected $table = 'partidas';
    protected $fillable = ['id', 'codigo', 'nombre', 'fecha', 'jugadores_partida', 'comentario'];
    public $incrementing = true;


    public function juego(){
        return $this->hasOne(App\Models\Juego::class, 'id', 'juego_id');
    }
    public function getJuegoNombreAttribute(){
        if($this->jugador()->first()){
            return $this->jugador()->first()->nombre;
        }else{
            return "";
       }
    }
    public function jugador(){
        return $this->hasMany(App\Models\Jugador::class,'id', 'jugador_id');
    }
    public function getJugadorNombreAttribute(){
        if($this->jugador()->first()){
            return $this->jugador()->first()->nombre;
        }else{
            return "";
       }
    }
    public static function campos(){
        return[
            new ItemListado('codigo', 'partidas.codigo', Lang::get('site.codigo')),
            new ItemListado('nombre', 'partidas.nombre', Lang::get('site.nombre')),
            new ItemListado('fecha', 'partidas.fecha', Lang::get('site.fecha')),
            new ItemListado('juego', 'partidas.juego', Lang::get('site.juego')),
            new ItemListado('jugadores_partida', 'partidas.jugadores_partida', Lang::get('site.jugadores_partida')),
            new ItemListado('comentario', 'partidas.comentario', Lang::get('site.cpmentario')),
        ];
    }
    public static function campos_defecto(){
        return ['codigo', 'nombre', 'fecha', 'jugadores_partida', 'comentario'];
    }
}