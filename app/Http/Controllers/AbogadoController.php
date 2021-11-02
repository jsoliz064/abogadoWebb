<?php

namespace App\Http\Controllers;

use App\Models\Abogado;
use Illuminate\Http\Request;
 
class AbogadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {   //               ('can:materias.index') aprobando permiso, ->only('index') solo para el metodo index
        $this->middleware('can:abogados.index')->only('index');
        $this->middleware('can:abogados.create')->only('create', 'store');
        $this->middleware('can:abogados.edit')->only('edit', 'update');
        $this->middleware('can:abogados.destroy')->only('destroy');
        $this->middleware('can:login');

    }
    
    public function index()
    {
        $abogados=Abogado::all();
        return view('abogado.index',compact('abogados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('abogado.create');
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
        $abogados=Abogado::create([
            'ci'=>request('ci'),
            'nombre'=>request('nombre'),
            'telefono'=>request('telefono'),
            'email'=>request('email'),
        ]);
        return redirect()->route('abogados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Abogado  $abogado
     * @return \Illuminate\Http\Response
     */
    public function show(Abogado $abogado)
    {
        return view('abogado.show',compact ('abogado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Abogado  $abogado
     * @return \Illuminate\Http\Response
     */
    public function edit(Abogado $abogado)
    {
        return view('abogado.edit',compact('abogado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Abogado  $abogado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abogado $abogado)
    {
        date_default_timezone_set("America/La_Paz");
        $abogado->ci=$request->ci;
        $abogado->nombre=$request->nombre;
        $abogado->telefono=$request->telefono;
        $abogado->email=$request->email;
        $abogado->save();
        return redirect()->route('abogados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Abogado  $abogado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abogado $abogado)
    {
        $abogado->delete();
        return redirect()->route('abogados.index');
    }
}
