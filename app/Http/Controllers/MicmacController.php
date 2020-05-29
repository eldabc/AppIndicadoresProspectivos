<?php

namespace App\Http\Controllers;

use App\micmac;

use Illuminate\Http\Request;
use Redirect;
class MicmacController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	} 
	
	public function index( ){
		$proy = micmac::orderBy('proyecto', 'asc')->join('method', 'method.proyecto_id', '=', 'micmacs.id')->get();
		$x='null';
		//die(dump($proy));
		return view('micmac.index',compact('proy', 'x'));

	} 

	public function upper($str) {
		// recibe 'Hello WORLD" y devuelve "HELLO WORLD"
		return strtoupper($str);
	}

	public function create(){


 		//$variable = micmacs::where('proyecto', $proyecto)->get();
    	 return view('micmac.create');
	}

	public function store(){

    	
	}

	 public function show($proyecto)
    {
        $variable = micmac::where('proyecto', $proyecto)->get();
        $var3=0;
        $var2=0;
        $max=0;
        $numero=1;

        // die(dump($variable));

    return view('micmac.show', compact( 'variable', 'numero', 'var3', 'var2', 'max', 'prueba' ));
    }

	public function showVariables()
	{
		$variable = micmac::get();
		$var3=0;
        $var2=0;
        $max=0;
        $x='null';
        $numero=1;

        // die(dump($variables));

    return view('micmac.showVariables', compact( 'variable', 'numero', 'var3', 'var2', 'max', 'x'));
	     
	}

	public function graficasVariables(){
		return view('micmac.graficasVariables');
	}
   
}
