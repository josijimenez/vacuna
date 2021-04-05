<?php

namespace App\Exports;

use App\Models\Persona;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class VacunadosExport implements FromCollection, WithHeadings
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
    	//return Persona::all();

    	 $query = Persona::query();

    	if ( $this->request->has('primera_farmaceutica') && trim($this->request->input('primera_farmaceutica')) !== '' ){
            $query = $query->where('primera_farmaceutica', 'like', '%' . trim($this->request->input('primera_farmaceutica')) . '%');
        }

    	if ( $this->request->has('primera_provincia') && trim($this->request->input('primera_provincia')) !== '' ){
            $query = $query->where('primera_provincia', 'like', '%' . trim($this->request->input('primera_provincia')) . '%');
        }

		if ( $this->request->has('primera_ciudad') && trim($this->request->input('primera_ciudad')) !== '' ){
            $query = $query->where('primera_ciudad', 'like', '%' . trim($this->request->input('primera_ciudad')) . '%');
        }


        if ( $this->request->has('primera_puesto') && trim($this->request->input('primera_puesto')) !== '' ){
            $query = $query->where('primera_puesto', 'like', '%' . trim($this->request->input('primera_puesto')) . '%');
        }

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
	        'observacion')->orderBy('personas.nombres', 'asc')->get();
        
        return $personas;
		
    }
}
