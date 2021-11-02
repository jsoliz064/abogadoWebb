<?php

namespace App\Http\Controllers;

use App\Models\Procurador;
use Illuminate\Http\Request;

class ProcuradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {   //               ('can:materias.index') aprobando permiso, ->only('index') solo para el metodo index
        $this->middleware('can:procuradores.index')->only('index');
        $this->middleware('can:procuradores.create')->only('create', 'store');
        $this->middleware('can:procuradores.edit')->only('edit', 'update');
        $this->middleware('can:procuradores.destroy')->only('destroy');
        $this->middleware('can:login');
        
    }
    
    public function index()
    {
        $procuradors=Procurador::all();
        return view('procurador.index',compact('procuradors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('procurador.create');
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
        $procuradors=Procurador::create([
            'ci'=>request('ci'),
            'nombre'=>request('nombre'),
            'telefono'=>request('telefono'),
            'email'=>request('email'),
        ]);
        return redirect()->route('procuradors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Procurador  $procurador
     * @return \Illuminate\Http\Response
     */
    public function show(Procurador $procurador)
    {
        return view('procurador.show',compact ('procurador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Procurador  $procurador
     * @return \Illuminate\Http\Response
     */
    public function edit(Procurador $procurador)
    {
        return view('procurador.edit',compact('procurador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Procurador  $procurador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Procurador $procurador)
    {
        date_default_timezone_set("America/La_Paz");
        $procurador->ci=$request->ci;
        $procurador->nombre=$request->nombre;
        $procurador->telefono=$request->telefono;
        $procurador->email=$request->email;
        $procurador->save();
        return redirect()->route('procuradors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Procurador  $procurador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Procurador $procurador)
    {
        $procurador->delete();
        return redirect()->route('procuradors.index');
    }
}
