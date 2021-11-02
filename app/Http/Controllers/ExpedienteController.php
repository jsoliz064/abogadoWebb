<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Models\Abogado;
use App\Models\Cliente;
use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpedienteController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expedientes=Expediente::where('id_usuario',auth()->user()->id);
        return view('expediente.index',compact('expedientes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes=Cliente::All();
        return view('expediente.create', compact ('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->id_cliente <>"null"){
            date_default_timezone_set("America/La_Paz");
            $expedientes=Expediente::create([
                'id_cliente'=>request('id_cliente'),
                'id_usuario'=>auth()->user()->id,
                'codigo'=>request('codigo'),
                'nombre'=>request('nombre'),
                'materia'=>request('materia'),
            ]);
            $expediente=Expediente::all()->last()->id;
            return redirect()->route('expedientes.show',compact ('expediente'));
        }else{
            return redirect()->route('expedientes.create')->with('status','Seleccione un Cliente');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function show(Expediente $expediente)
    {
        $cliente=Cliente::where('id',$expediente->id_cliente)->value('nombre');
        return view('expediente.show',compact ('expediente','cliente'));
    }
    public function showAbogados(Expediente $expediente)
    {
        $abogadoos=DB::select("SELECT * FROM abogados WHERE id NOT IN(SELECT id_abogado FROM abogado_expedientes WHERE id_expediente=$expediente->id)");
        $abogados=DB::select("SELECT * FROM abogados WHERE id IN(SELECT id_abogado FROM abogado_expedientes WHERE id_expediente=$expediente->id)");
        return view('expediente.showAbogados',compact ('expediente','abogados','abogadoos'));
    }
    public function showProcuradores(Expediente $expediente)
    {
        $procuradoors=DB::select("SELECT * FROM procuradors WHERE id NOT IN(SELECT id_procurador FROM procurador_expedientes WHERE id_expediente=$expediente->id)");
        $procuradors=DB::select("SELECT * FROM procuradors WHERE id IN(SELECT id_procurador FROM procurador_expedientes WHERE id_expediente=$expediente->id)");
        return view('expediente.showProcuradors',compact ('expediente','procuradors','procuradoors'));
    }
    public function showDocumentos(Expediente $expediente)
    {
        $documentos=Documento::where('id_expediente',$expediente->id)->get();
        //$procuradoors=DB::select("SELECT * FROM procuradors WHERE id NOT IN(SELECT id_procurador FROM procurador_expedientes WHERE id_expediente=$expediente->id)");
        //$documentos=DB::select("SELECT * FROM expedientes WHERE id IN(SELECT id_procurador FROM procurador_expedientes WHERE id_expediente=$expediente->id)");
        return view('expediente.showDocumentos',compact ('expediente','documentos'));
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
