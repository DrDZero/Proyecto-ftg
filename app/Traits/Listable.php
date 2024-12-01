<?php


namespace App\Traits;


use App\Models\UsuarioConfiguracion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;

trait Listable
{

    public static function has_acciones(){
        return true;
    }

    public static function getCampoOrder($orderBy){
        foreach (self::campos() as $item){
            if($item->label == $orderBy){
                return $item->sql;
            }
        }
        return $orderBy;
    }

    public static function getCamposQuery($selecteds = []){
        $clase = static::class;
        $result = (new $clase())->getTable().'.id as id';
        if(sizeof($selecteds)){
            $campos = array_filter(
                self::campos(),
                function($val) use ($selecteds){
                    return in_array($val->id,$selecteds);
                });
        }
        else{
            $campos = self::campos();
        }
        foreach ($campos as $key=>$campo){
            $result .= ', '.$campo->sql.' as "'.$campo->label.'"';
        }
        return DB::raw($result);
    }

    public static function getCamposColumnas($selected_campos = null){
        $selected_campos = Listable::updateConfiguracion(static::class,self::campos_defecto(),$selected_campos);
        $campos = array();
        $campo_encontrado = null;
        foreach ($selected_campos as $item){
            for($i=0; $i < sizeof(self::campos());$i++){
                if((self::campos())[$i]->id == $item){
                    $campo_encontrado = self::campos()[$i];
                    break;
                }

            }
            if($campo_encontrado){
                $campos[] = $campo_encontrado;
            }
        }

        foreach ($campos as $key=>$campo){
            $result[] = $campo->label;
        }
        if(self::has_acciones()){
            $result[] = 'acciones';
        }
        return $result;
    }

    public static function getCamposExportar($selected_campos = null){
        $selected_campos = Listable::updateConfiguracion(static::class,self::campos_defecto(),$selected_campos);
        $campos = array_filter(
            self::campos(),
            function($val) use ($selected_campos){
                return in_array($val->id,$selected_campos);
            });

        foreach ($campos as $key=>$campo){
            $result[$campo->label] = (object)array('titulo' => $campo->label, 'tipo'=>$campo->tipo, 'valores' => $campo->tipo == Config::get('tipos_columnas.enum')?$campo->items:null);
        }
        return $result;
    }

    public static function updateConfiguracion($modulo,$campos_defecto,$selected_campos){
        $get_columnas = UsuarioConfiguracion::where('modulo',$modulo)->where('usuario_id',Auth::user()->id)->first();
        $default_columnas = $get_columnas?json_decode($get_columnas->columnas):$campos_defecto;
        if($selected_campos){
            UsuarioConfiguracion::updateOrCreate([
                'usuario_id'=>Auth::user()->id,
                'modulo'=>$modulo,
            ],
                [
                    'columnas'=>json_encode($selected_campos)
                ]);
        }

        return $selected_campos?$selected_campos:$default_columnas;
    }
}