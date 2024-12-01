<?php

namespace App\Models;

use App\Helpers\ItemListado;
use App\Traits\Listable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;

class Menu extends Model{
    use Listable;

    protected $table = 'menus';

    protected $fillable = ['nombre', 'slug', 'diseno', 'orden', 'tipo', 'url', 'target', 'html', 'css'];

    protected $appends = ['url_menu'];

    public function getUrlMenuAttribute(){
        if($this->slug)
            return route('slug.menu', ['slug' => $this->slug ]);
        return "";
    }

    public static function campos(){

        $array_diseno = [
            (object)array('id'=>Config::get('opciones_menu.container'),'nombre' => Lang::get('site.container')),
            (object)array('id'=>Config::get('opciones_menu.full_width'),'nombre' => Lang::get('site.full_width')),
            (object)array('id'=>Config::get('opciones_menu.canvas'),'nombre' => Lang::get('site.canvas')),
        ];
        $array_tipo = [
            (object)array('id'=>Config::get('opciones_colocacion.header'),'nombre' => Lang::get('site.header')),
            (object)array('id'=>Config::get('opciones_colocacion.footer'),'nombre' => Lang::get('site.footer')),
        ];


        return [
            new ItemListado('nombre','menus.nombre',Lang::get('site.nombre')),
            new ItemListado('slug','menus.slug',Lang::get('site.slug')),
            new ItemListado('diseno','menus.diseno',Lang::get('site.diseno'),Config::get('tipos_columnas.enum'),$array_diseno),
            new ItemListado('tipo','menus.tipo',Lang::get('site.tipo'),Config::get('tipos_columnas.enum'),$array_tipo),
            new ItemListado('url','menus.url',Lang::get('site.url')),
            new ItemListado('target','menus.target',Lang::get('site.target')),
            new ItemListado('orden','menus.orden',Lang::get('site.orden')),
            new ItemListado('created_at','menus.created_at',Lang::get('site.fecha_inicio'),Config::get('tipos_columnas.fecha_hora')),
        ];
    }

    public static function campos_defecto(){
        return ['nombre','orden'];
    }



    public function destinos(){
        return $this->hasMany('App\Models\MenuDestino','menu_id','id');
    }
}
