<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\Partida;
use App\Models\Juego;

class PartidasController extends Controller{
    // Display a listing of the resource.
    public function index(){
        $partidas=Partida::all();
        return view("index",['partidas'=>$partidas]);
    }

    //Show the form for creating a new resource.
    public function create(){
        $juegos=Juego::all();
        return view("create", compact('juegos'));
    }

    // Store a newly created resource in storage.
    public function storePartida(Request $request){
        $request->validate ([
            'codigo'=>'required|unique:partidas',
            'nombre'=>'required',
            'jugadores_partida'=>'required'
        ],[
            'codigo.required' => __('El código de la partida no puede estar vacio'),
            'codigo.unique' => __('El código esta en uso, debe ser úinico'),
            'nombre.required' => __('El nombre de la partida es obligatorio'),
            'jugadores_partida.required' => __('Los jugadores son obligatorios')
        ]);
        $partida = new Partida;
        $partida -> codigo = $request -> codigo;
        $partida -> nombre = $request -> nombre;
        $partida -> fecha = $request -> fecha;
        $partida -> juego = $request -> juego;
        $partida -> jugadores_partida = $request -> jugadores_partida;
        $partida -> comentario = $request -> comentario;
        $partida -> save();
        return view("home");
    }

    // Display the specified resource.
    public function show(Partida $partida){
        //
    }

    //Show the form for editing the specified resource.
    public function edit(Partida $partida){
        //
    }

    //Update the specified resource in storage.
    public function update(Request $request, Partida $partida){
        //
    }

    //Remove the specified resource from storage.
    public function destroy(Partida $partida){
        //
    }
}