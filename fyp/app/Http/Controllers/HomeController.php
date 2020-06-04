<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle_Info;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vehicles = Vehicle_Info::where(
            'availability_status','=','available'
        )->get();
        return view('landing',compact('vehicles'));
    }
}
