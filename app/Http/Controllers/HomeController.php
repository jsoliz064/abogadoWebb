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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $expedientes=Expediente::All();
        return view('index',compact('expedientes'));
    }
    public function index2(Request $request)
    {
        if ($request->id_expediente<>""){
        $expedientes=Expediente::where('codigo',$request->id_expediente)->get();
        }else{
        $expedientes=Expediente::All();
        }
        return view('index',compact('expedientes'));
    }
    
}
