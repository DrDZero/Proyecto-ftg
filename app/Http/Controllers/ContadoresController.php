<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contador;

class ContadoresController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $contadores = Contador::all();
        return view ("contador",['contadores'=>$contadores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeContador(Request $request){
        Contador::create([
            'contadorA' => $request -> contadorA,
            'contadorB' => $request -> contadorB,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Contador $contador){

        return view ("viewContador",['contador'=>$contador]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contador $contador){
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contador $contador){
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contador $contador){
        $contador -> delete();
        return redirect()->back();

    }
}