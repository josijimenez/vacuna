<?php

namespace App\Exports;

use App\Models\Persona;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PuestoExport implements FromCollection, WithHeadings
{

	protected $request;

	function __construct($request) {
        $this->request = $request;
 	}



	/**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
          	'TIPO DE INSTITUCION',
            'INSTITUCION',
        	'CEDULA',
        	'NOMBRES',
        	'PROFESION',
        	'AREA',
        	'PUESTO',
	        'FECHA DE NACIMIENTO',
	        'CONTACTO TELEFONICO',
	        'COVID',
	        'FECHA COVID',
	        'DIGITADOR',
	        'PRIMERA DOSIS',
	        'PRIMERA DOSIS FARMACEUTICA',
	        'PRIMERA DOSIS PROVINCIA',
	        'PRIMERA DOSIS CIUDAD',
	        'PRIMERA DOSIS PUESTO',
	        'PRIMERA DOSIS FECHA',
	        'PRIMERA DOSIS HORA',
	        'PRIMERA DOSIS DIGITADOR',
	        'PRIMERA DOSIS OBSERVACION',
	       	'SEGUNDA DOSIS',
	        'SEGUNDA DOSIS FARMACEUTICA',
	        'SEGUNDA DOSIS PROVINCIA',
	        'SEGUNDA DOSIS CIUDAD',
	        'SEGUNDA DOSIS PUESTO',
	        'SEGUNDA DOSIS FECHA',
	        'SEGUNDA DOSIS HORA',
	        'SEGUNDA DOSIS DIGITADOR',
	        'SEGUNDA DOSIS OBSERVACION',
	        'OBSERVACIONES GENERALES',
        ];
    }



    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       // return Persona::all();

    	 $query = Persona::query();

       // if ($request->filled('fecha_inicio') and $request->filled('fecha_inicio')) {
        	//Reservation::whereBetween('reservation_from', [$from, $to])->get();
    		//$query = $query->whereBetween('primera_farmaceutica', 'like', '%' . trim($this->request->input('primera_farmaceutica')) . '%');
		//}

    	$fecha_inicio = trim($this->request->input('fecha_inicio'));
    	$fecha_fin =trim($this->request->input('fecha_fin'));
		
		//dd($fecha_inicio . ' - ' . $fecha_fin);
        //exit(0);

    	$puesto_vacunacion = trim($this->request->input('puesto_vacunacion'));

    	//dd($puesto_vacunacion);
        //exit(0);

    	if ($this->request->filled('puesto_vacunacion')) {
			$query = $query->where(function($q)  use ($puesto_vacunacion) {
                $q->where('primera_puesto', '=', $puesto_vacunacion)
                      ->orWhere('segunda_puesto', '=', $puesto_vacunacion);
            });
		}

		$query = $query->whereBetween('primera_fecha', [$fecha_inicio, $fecha_fin])
  					->orWhereBetween('segunda_fecha', [$fecha_inicio, $fecha_fin]);
		//$query = $query->whereBetween('segunda_fecha', [$fecha_inicio, $fecha_fin]);

  		

  		//dd($puesto_vacunacion);
        //exit(0);

		

		//dd( $query->toSql() );
        //exit(0);

		/*

		$users = DB::table('users')
            ->where('votes', '>', 100)
            ->orWhere(function($query) {
                $query->where('name', 'Abigail')
                      ->where('votes', '>', 50);
            })
            ->get();

		*/
  

        $personas = $query->select(
        	'tipo_institucion',
        	'institucion',
	        'cedula',
	        'nombres',
	        'profesion',
	        'area',
	        'puesto',
	        'fecha_nacimiento',
	        'telefono',
	        'covid',
	        'fecha_covid',
	        'digitador',
	        'primera_vacunado',
	        'primera_farmaceutica',
	        'primera_provincia',
	        'primera_ciudad',
	        'primera_puesto',
	        'primera_fecha',
	        'primera_hora',
	        'primera_digitador',
	        'primera_observacion',
	        'segunda_vacunado',
	        'segunda_farmaceutica',
	        'segunda_provincia',
	        'segunda_ciudad',
	        'segunda_puesto',
	        'segunda_fecha',
	        'segunda_hora',
	        'segunda_digitador',
	        'segunda_observacion',
	        'observacion')->orderBy('nombres', 'asc')->get();
        
        return $personas;
    }
}
