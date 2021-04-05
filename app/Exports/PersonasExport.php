<?php

namespace App\Exports;

use App\Models\Persona;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class PersonasExport implements FromCollection, WithHeadings
{

	protected $puesto_vacunacion;

	function __construct($puesto_vacunacion) {
        $this->puesto_vacunacion = $puesto_vacunacion;
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

    	if ( $this->puesto_vacunacion && $this->puesto_vacunacion !== '' ){
           //dd($this->puesto_vacunacion);
        	//exit(0);
        //die();
        }

        //return Persona::all();
        $personas = DB::table('personas')->where('primera_puesto', $this->puesto_vacunacion)->select(
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
	        'observacion')->get();
        return $personas;
		
    }
}
