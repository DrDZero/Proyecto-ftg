<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\Juego;

class JuegosController extends Controller{
    public function index(){
        //$juegos=array('x','y','z');
        $juegos=Juego::all();
        return view("index", ['juegos'=>$juegos]);
    }
    public function create(){
        return view("create" /*, compact('juegos')*/);
    }
    public function show(Juego $id){
        //$juegos=Juego::all();
        return view("show", compact('juego'));
    }
    public function storeJuego(Request $request){
        
        $request->validate ([
            'codigo'=>'required|unique:juegos',
            'nombre'=>'required',
        ],[
            'codigo.required' => __('El código del juego no puede estar vacio'),
            'codigo.unique' => __('El código esta en uso, debe ser úinico'),
            'nombre.required' => __('El nombre del juego es obligatorio')
        ]);
        $juego=new Juego;
        $juego->codigo = $request->codigo;
        $juego->nombre = $request->nombre;
        $juego->activo = 1;
        $juego->jugadores_minimos = $request-> jugadores_minimos;
        $juego->jugadores_maximos = $request-> jugadores_maximos;
        $juego->descripcion = $request->descripcion;
        $juego->save();
        return view("home");
    }
    public function updateJuego(Request $request){
        $juego=Juego::find($request);
        $juego->nombre;
        return view('update');
    }
    public function getTodos(){
        $juegos = Juego::orderBy('juego_id','asc')->get();
        return response()->json(['juegos'=>$juegos]);
    }
}