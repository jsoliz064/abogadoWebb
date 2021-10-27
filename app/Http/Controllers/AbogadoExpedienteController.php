<?php

namespace App\Http\Controllers;

use App\Models\AbogadoExpediente;
use App\Models\Expediente;
use App\Models\Abogado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbogadoExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expedientes=Expediente::all();
        $abogados=Abogado::all();
        return view('expediente.index',compact('expedientes','abogados'));
    }
    public function create2($expediente)
    {
        $abogadosexpedientes=DB::select('SELECT * FROM abogados WHERE id IN (SELECT id_abogado FROM abogado_expedientes)');
        $abogados=DB::select('SELECT * FROM abogados,abogado_expedientes WHERE abogados.id<>abogado_expedientes.id_abogado');
        return view('abogadoExpediente.create2',compact('abogados','expediente','abogadosexpedientes'));
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
        $abogadoExpediente=abogadoExpediente::create([
            'id_abogado'=>request('id_abogado'),
            'id_expediente'=> request('id_expediente'),
        ]);
        $expediente=$request->id_expediente;
        return redirect(route('expedientes.create2',compact('expediente')));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AbogadoExpediente  $abogadoExpediente
     * @return \Illuminate\Http\Response
     */
    public function show(AbogadoExpediente $abogadoExpediente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AbogadoExpediente  $abogadoExpediente
     * @return \Illuminate\Http\Response
     */
    public function edit(AbogadoExpediente $abogadoExpediente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AbogadoExpediente  $abogadoExpediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AbogadoExpediente $abogadoExpediente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AbogadoExpediente  $abogadoExpediente
     * @return \Illuminate\Http\Response
     */
    public function destroy(AbogadoExpediente $abogadoExpediente)
    {
        //
    }
}
