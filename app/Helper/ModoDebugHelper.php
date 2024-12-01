<?php

namespace App\Helpers;

//use App\Exports\ListadoExport;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;

class ModoDebugHelper{
    public static function emailDestino($email){
        if(intval(env("MODO_DEBUG"))){
            return env('EMAIL_DEBUG');
        }
        return $email;
    }
}