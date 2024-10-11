<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoardGamesController extends Controller
{
    public function bindex(){
        $boardgames=array(/*'x','y','z'*/);
        return view("bindex", ['board'=>$boardgames]);
    }
    public function create(){
        return view("create");
    }
    public function show(){
        return view("show", [''],['']);
    }

}