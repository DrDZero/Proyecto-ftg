<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contador;

class ContadorView extends Component{
    public contador $contador;
    public function mount($contador){
        $this->contador = $contador;
    }
    public function render(){
        return view('livewire.contador-view');
    }
    public function incrementA($qty){
        $this->contador->contadA = $this->contador->contadA + $qty;
        $this->contador->save();
    }
    public function incrementB($qty){
        $this->contador->contadB = $this->contador->contadB + $qty;
        $this->contador->save();
    }
    public function decrementA($qty){
        $this->contador->contadA = $this->contador->contadA - $qty;
        $this->contador->save();
    }
    public function decrementB($qty){
        $this->contador->contadB = $this->contador->contadB - $qty;
        $this->contador->save();
    }

}
