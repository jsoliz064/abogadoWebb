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
    public function __construct()
    {
        $this->middleware('can:login');
    }
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
    public function storeAbogadoExpediente(Request $request,Expediente $expediente)
    {
        if ($request->id_abogado<>"null"){
            date_default_timezone_set("America/La_Paz");
            $abogadoExpediente=abogadoExpediente::create([
                'id_abogado'=>request('id_abogado'),
                'id_expediente'=> $expediente->id,
            ]);
            return redirect(route('expedientes.abogados',compact('expediente')));
        }
        else {
            return redirect()->route('expedientes.abogados',compact('expediente'))->with('status','Seleccione un abogado');
        }
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
    public function destroyAbogadoExpediente(Request $request,Expediente $expediente)
    {
        $abogadoExpediente_id=DB::select("SELECT id FROM abogado_expedientes WHERE id_expediente=$expediente->id and id_abogado=$request->abogado");
        if ($abogadoExpediente_id){
            abogadoExpediente::destroy($abogadoExpediente_id[0]->id);
            return redirect()->route('expedientes.abogados',compact ('expediente'));
        }
        return redirect()->route('expedientes.abogados',compact ('expediente'))->with('status','no se pudo eliminar');
    }
}
