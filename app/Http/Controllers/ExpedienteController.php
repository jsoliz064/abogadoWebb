<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Models\Abogado;
use Illuminate\Http\Request;

class ExpedienteController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expedientes=Expediente::all();
        return view('expediente.index',compact('expedientes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expediente.create2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set("America/La_Paz");
        $expedientes=Expediente::create([
            'codigo'=>request('codigo'),
            'nombre'=>request('nombre'),
            'materia'=>request('materia'),
        ]);
        $expediente=Expediente::all()->last()->id;
        return redirect()->route('expedientes.create2',$expediente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function show(Expediente $expediente)
    {
        return view('expediente.show',compact ('expediente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function edit(Expediente $expediente)
    {
        return view('expediente.edit',compact('expediente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expediente $expediente)
    {
        date_default_timezone_set("America/La_Paz");
        $expediente->codigo=$request->codigo;
        $expediente->nombre=$request->nombre;
        $expediente->materia=$request->materia;
        $expediente->save();
        return redirect()->route('expedientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expediente $expediente)
    {
        $expediente->delete();
        return redirect()->route('expedientes.index');
    }
}
