<?php

namespace App\View\Components\Adminlte\Layout;

use Illuminate\View\Component;

class Layout extends Component{
    //crea una instancia de component.
    public function __construct(){
        //
    }
    public function render(): View|Closure|string{
        return view ('components.layout');
    }
}