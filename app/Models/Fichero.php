<?php

namespace App\Models;

use App\Helpers\ItemListado;
use App\Traits\Listable;
use Carbon\Carbon;
use Illuminate\Support\Fcades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class Fichero extends Model{
    use Listable;
    protected $table = ficheros;
    protected $fillable = ['id', 'nombre', 'ruta'];
    protected $primaryKey = 'id';
    public $incrementing = true;
}
