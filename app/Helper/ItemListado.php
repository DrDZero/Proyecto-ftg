<?php

namespace App\Helpers;

class ItemListado
{
    public $tipo = 0; // 0 => texto 1 => si no ; 2 => enum ; 3 => fecha ; 4 => Fecha hora ; 5 => raw
    public $label = '';
    public $id = '';
    public $sql = null;
    public $items = [];

    public function __construct($id,$sql,$label,$tipo=0,$items=[])
    {
        $this->id = $id;
        $this->sql = $sql;
        $this->label = $label;
        $this->tipo = $tipo;
        $this->items = $items;
    }

    public function buscarItem($needle){
        foreach ($this->items as $item){
            if($item->id == $needle){
                return $item->nombre;
            }
        }
        return '';
    }
}
