<?php 

# Ubicacion app\Helpers\Check.php

namespace App\Helpers;

use App\Models\Dosis;
use App\Models\Persona;

class Check
{

	var $name;
    var $amount;

    public function __construct($name, $amount)
    {
        $this->name = $name;
        $this->amount = $amount;
    }

 	

    public static function strUp(string $string)
    {
        return strtoupper($string);
    }

/*
    public static function dosisEntregadas($puesto, $fecha, $farmaceuticas)
    {
        
    	 $query = Dosis::query();

        if ( $puesto ){
            $query = $query->where('dosis.puesto', '=', $puesto);
        }

        if ( $fecha ){
            $query = $query->whereDate('dosis.fecha', $fecha);
        }

        $dosis_entregadas = array();

        foreach ($farmaceuticas as $farmaceutica) { 
            $amount = $query->where('dosis.farmaceutica', '=', $farmaceutica)->count();
            $check = new Check($farmaceutica,  $amount);
            array_push($dosis_entregadas, $check);
        }

        return $dosis_entregadas;
    }

*/

     public static function dosisEntregadas($puesto, $fecha, $farmaceuticas)
    {
        

        $dosis_entregadas = array();

        foreach ($farmaceuticas as $farmaceutica) { 
            $query = Dosis::query();

            $query->when( $puesto , function ($q) use ($puesto) {
		    	return $q->where('dosis.puesto', '=', $puesto);
			});

			$query->when( $fecha , function ($q) use ($fecha){
		    	return $q->where('dosis.fecha', '=', $fecha);
			});

           
            $amount = $query->where('dosis.farmaceutica', '=', $farmaceutica)->sum('dosis.cantidad');

            $check = new Check($farmaceutica,  $amount);
            array_push($dosis_entregadas, $check);
        }

         //dd($amount);
        	//exit(0);

        return $dosis_entregadas;
    }


    public static function personasVacundas($puesto, $fecha, $farmaceuticas)
    {
           
           /*
            $query = $query->where(function ($search) use ($puesto) {
                     $search->where('personas.primera_puesto', '=' , $puesto)
                            ->orWhere('personas.segunda_puesto', '=' , $puesto);
                        });
            */

        $personas_vacunadas = array();

        foreach ($farmaceuticas as $farmaceutica) { 
    		
    		$query_primera = Persona::query();
    		$query_segunda = Persona::query();

    		$query_primera->when( $puesto , function ($q) use ($puesto) {
		    	return $q->where('personas.primera_puesto', '=', $puesto);
			});
			$query_segunda->when( $puesto , function ($q) use ($puesto){
		    	return $q->where('personas.segunda_puesto', '=', $puesto);
			});


			$query_primera->when( $fecha , function ($q) use ($fecha){
		    	return $q->whereDate('personas.primera_fecha', '=', $fecha);
			});
			$query_segunda->when( $fecha , function ($q) use ($fecha){
		    	return $q->whereDate('personas.segunda_fecha', '=', $fecha);
			});

			$amount_primera = $query_primera->where('personas.primera_farmaceutica', '=', $farmaceutica)->count();
			
			//if($fecha and $farmaceutica == 'SINOVAC'){
			//	dd( $farmaceutica . ' - ' . $amount_primera);
        	//	exit(0);
			//}
		
			$amount_segunda = $query_segunda->where('personas.segunda_farmaceutica', '=', $farmaceutica)->count();
    	    $amount =  $amount_primera + $amount_segunda;
    	   

            $check = new Check($farmaceutica,  $amount);
            array_push($personas_vacunadas, $check);
        }

        return $personas_vacunadas;
    }


}