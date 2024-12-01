<?php


namespace App\Traits;


use App\Models\UsuarioConfiguracion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;

trait SaveToUpper{
    protected $no_uppercase = ['email','web','foto'];

    public function setAttribute($key, $value){
        parent::setAttribute($key, $value);
        if (is_string($value)){
            if ($this->no_upper !== null) {
                if (!in_array($key, $this->no_uppercase)){
                    if(!in_array($key, $this->no_upper)){
                        $this->attributes[$key] = trim(mb_strtoupper($value));
                    }
                }             
            }
            else if (!in_array($key, $this->no_uppercase)){
                $this->attributes[$key] = trim(mb_strtoupper($value));
            }
        }
    }
}