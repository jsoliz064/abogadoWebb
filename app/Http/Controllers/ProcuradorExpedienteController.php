<?php

namespace App\Http\Controllers;

use App\Models\ProcuradorExpediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Expediente;

class ProcuradorExpedienteController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function storeProcuradorExpediente(Request $request,Expediente $expediente)
    {
        if ($request->id_procurador<>"null"){
            date_default_timezone_set("America/La_Paz");
            $procuradorExpediente=procuradorExpediente::create([
                'id_procurador'=>request('id_procurador'),
                'id_expediente'=> $expediente->id,
            ]);
            return redirect(route('expedientes.procuradors',compact('expediente')));
        }
        else {
            return redirect()->route('expedientes.procuradors',compact('expediente'))->with('status','Seleccione un Procurador');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProcuradorExpediente  $procuradorExpediente
     * @return \Illuminate\Http\Response
     */
    public function show(ProcuradorExpediente $procuradorExpediente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProcuradorExpediente  $procuradorExpediente
     * @return \Illuminate\Http\Response
     */
    public function edit(ProcuradorExpediente $procuradorExpediente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProcuradorExpediente  $procuradorExpediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProcuradorExpediente $procuradorExpediente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProcuradorExpediente  $procuradorExpediente
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProcuradorExpediente $procuradorExpediente)
    {
        //
    }
    public function destroyProcuradorExpediente(Request $request,Expediente $expediente)
    {
        $procuradorExpediente_id=DB::select("SELECT id FROM procurador_expedientes WHERE id_expediente=$expediente->id and id_procurador=$request->procurador");
        if ($procuradorExpediente_id){
            procuradorExpediente::destroy($procuradorExpediente_id[0]->id);
            return redirect()->route('expedientes.procuradors',compact ('expediente'));
        }
        return redirect()->route('expedientes.procuradors',compact ('expediente'))->with('status','no se pudo eliminar');
    }
}
