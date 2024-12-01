<?php

namespace App\Models;

use App\Helpers\ItemListado;
use App\Traits\Listable;
use Carbon\Carbon;
use Illuminate\Support\Fcades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model{
    use Listable;

    protected $table = 'jugadores';
    protected $fillable = ['id', 'numero_jugador', 'nombre', 'puntos', 'activo'];
    protected $primaryKey = 'id';
    public $incrementing = true;

    public function juego(){
        return $this->hasOne(App\Models\Jugador::class,'id', 'juego_id');
    }
    
    public function getJuegoNombreAttribute()
    {
        if($this->juego()->first()){
            return $this->juego()->first()->nombre;
       }else{
            return "";
       }
    }
    public function puntuacion(){
        return $this->hasOne(App\Models\Puntuacion::class,'id', 'puntuacion_id');
    }
    public function partida(){
        return $this->hasOne(App\Models\Partida::class,'id', 'partrida_id');
    }
}