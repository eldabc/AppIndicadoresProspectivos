<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\micmac;
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
        $proy = micmac::orderBy('proyecto', 'asc')->join('method', 'method.proyecto_id', '=', 'micmacs.id')->get();
		$x='null';
		return view('micmac.index',compact('proy', 'x'));
    }
}
