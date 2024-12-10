<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\Jugador;

class JugadoresController extends Controller{
    // Display a listing of the resource.
    public function index(){
        $jugadores=Jugador::all();
        return view("index", ['jugadores'=>$jugadores]);
    }

    //Show the form for creating a new resource.
    public function create(){
        return view("create");
    }

    // Display the specified resource.
    public function show(Jugador $jugador){
        return view("show", compact('jugador'));
    }

    // Store a newly created resource in storage.
    public function storeJugador(Request $request){
        $request->validate ([
            'numero_jugador'=>'required|unique:jugadores',
            'nombre'=>'required',
        ],[
            'numero_jugador.required' => __('El número del jugador es obligatorio'),
            'numero_jugador.unique' => __('El número del jugador esta en uso, debe ser úinico'),
            'nombre.required' => __('El nombre del jugador es obligatorio')
        ]);
        $jugador=new Jugador;
        $jugador -> numero_jugador = $request -> numero_jugador;
        $jugador -> nombre = $request -> nombre;
        $jugador -> puntos = 0;
        $jugador -> activo = 1;
        $jugador -> save();
        return view("home");
    }

    //Show the form for editing the specified resource.
    public function edit(Jugador $jugador){
        //
    }

    //Update the specified resource in storage.
    public function update(Request $request, Jugador $jugador){
        $jugador=Jugador::find($request);
        $jugador->nombre;
        return view('update');
    }

    //Remove the specified resource from storage.
    public function destroy(Jugador $jugador){
        //
    }

    public function getTodos(){
        $jugador = Jugador::orderBy('jugador_id', 'asc')-> get();
        return response()->json(['jugadores'=>$jugadores]);
    }
}