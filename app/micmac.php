<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class micmac extends Model
{
     protected $fillable = [
     	'proyecto', 'variable', 'influencia', 'dependencia', 'descripcion', 'zona',];


     	public function prueba($valor)
	    {

	        $diff = $valor+20;

	        /*Cambiar Y-m-d por el formato que tengas*/

	        return $diff;
	    }
}
