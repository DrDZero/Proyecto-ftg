<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DadosController extends Controller{
public function dado(){
    return view("dado");
}

}