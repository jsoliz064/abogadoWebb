<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expediente;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* $this->middleware('can:login'); */
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $expedientes=Expediente::where('id_usuario',auth()->user()->id)->get();
        return view('index',compact('expedientes'));
    }
    public function index2(Request $request)
    {
        if ($request->id_expediente<>""){
            $id_usuario=Expediente::where('codigo',$request->id_expediente)->value('id_usuario');
            if ($id_usuario==auth()->user()->id){
                $expedientes=Expediente::where('codigo',$request->id_expediente)->get();
                return view('index',compact('expedientes'));
            }
        }
        return redirect()->route('home')->with('status','Expediente no econtrado');
    }
    
}
