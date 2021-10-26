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
        $expedientes=Expediente::all();
        return view('home',compact('expedientes'));
    }
}
