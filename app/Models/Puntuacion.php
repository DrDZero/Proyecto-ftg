<?php

namespace App\Models;

use App\Helpers\ItemListado;
use App\Traits\Listable;
use Carbon\Carbon;
use Illuminate\Support\Fcades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class Puntuacion extends Model{
    use Listable;
    protected $table = 'puntuacion';
    protected $fillable = ['id', 'codigo', 'nombre', 'activo', 'jugadores_minimos', 'jugadores_maximos', 'descripcion'];
    protected $primaryKey = 'id';
    public $incrementing = true;

    public function jugador(){
        return $this->belongsToMany(App\Models\Jugador::class,'id', 'jugador_id');
    }
    public function getJugadorNombreAttribute(){
        if($this->jugador()->first()){
            return $this->jugador()->first()->nombre;
        }else{
            return "";
       }
    }

    public function partida(){
        return $this->hasOne(App\Models\Partida::class,'id', 'partida_id');
    }
    public function getPartidaNombreAttribute(){
        if($this->partida()->first()){
            return $this->partida()->first()->nombre;
        }else{
            return "";
       }
    }

}