<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Expediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos=Documento::all();
        
        return view('documento.index',compact('documentos'));
    }
    public function index2($expediente)
    {   
        $documentos=Documento::where('id_expediente',$expediente)->get();
        return view('documento.index',compact('documentos'));
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show(Documento $documento)
    {
        $codigoExpediente = DB::table('expedientes')->where('id',$documento->id_expediente)->value('codigo');
        return view('documento.show',compact ('documento','codigoExpediente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function edit(Documento $documento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documento $documento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documento $documento)
    {
        $ruta = DB::table('documentos')->where('id',$documento->id)->value('ruta');
        if (file_exists("../" . $ruta)){
            unlink("../" . $ruta);
        }
        $documento->delete();
        return redirect()->route('documentos.index');
    }
}
