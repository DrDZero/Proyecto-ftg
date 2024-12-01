<?php

namespace App\Models;

use App\Helpers\ItemListado;
use App\Traits\Listable;
use Carbon\Carbon;
use Illuminate\Support\Fcades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class Juego extends Model{
    use Listable;

    protected $table = 'juegos';
    protected $fillable = ['id', 'codigo', 'nombre', 'activo', 'jugadores_minimos', 'jugadores_maximos', 'descripcion'];
    protected $primaryKey = 'id';
    public $incrementing = true;
    //protected $appends = ['',];

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
    public function puntuacion(){
        return $this->hasMany(App\Models\Puntuacion::class,'id', 'puntuacion_id');

    }
    
    public function partida(){
        return $this->hasMany(App\Models\Partida::class,'id', 'partida_id');

    }

    public static function campos(){
        return[
            new ItemListado('codigo', 'juegos.codigo', Lang::get('site.codigo')),
            new ItemListado('nombre', 'juegos.nombre', Lang::get('site.nombre')),
            new ItemListado('activo', 'juegos.activo', Lang::get('site.activo')),
            new ItemListado('jugadores_minimos', 'juegos.juegadores_minimos', Lang::get('site.jugadores_minimos')),
            new ItemListado('jugadores_maximos', 'juegos.jugadores_maximos', Lang::get('site.jugadores_maximos')),
            new ItemListado('descripcion', 'juegos.descripcion', Lang::get('site.descripcion')),
        ];
    }
    public static function campos_defecto(){
        return ['codigo', 'nombre', 'activo', 'jugadores_minimos', 'jugadores_maximos', 'descripcion'];
    }
}