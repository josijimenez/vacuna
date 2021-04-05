<?php

namespace App\Exports;

use App\Models\Persona;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class PersonasExport implements FromCollection, WithHeadings
{

	protected $provincia;
	protected $ciudad;
	protected $puesto_vacunacion;

	function __construct($provincia; $ciudad; $puesto_vacunacion) {
        $this->provincia = $provincia;
        $this->ciudad = $ciudad;
        $this->puesto_vacunacion = $puesto_vacunacion;

 	}


	/**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'INSTITUCION',
        	'CONSTA EN LISTA',
        	'EOD',
        	'CEDULA',
        	'NOMBRES',
        	'REGIMEN LABORAL',
        	'TIPO DE NOMBRAMIENTO',
        	'UNIDAD OPERATIVA DONDE LABORA',
	        'AREA DONDE LABORA',
	        'DENOMINACION DEL PUESTO POSICIONAL',
	        'FECHA DE NACIMIENTO',
	        'CONTACTO TELEFONICO',
	        'GESTACION',
	        'MATERNIDAD',
	        'LACTANCIA',
	        'CATASTROFICA',
	        'TIPO',
	        'DISCAPACIDAD',
	        'NIVEL OCUPACIONAL',
	        'COVID',
	        'PROVINCIA',
	        'CIUDAD',
	        'PUNTOS DE VACUNACION',
	        'DESEA LA VACUNA',
	        'PRIMERA DOSIS FECHA',
	        'PRIMERA DOSIS HORA',
	        'DIGITADOR PRIMERA DOSIS',
	        'EQUIPO VACUNADOR PRIMERA DOSIS',
	        'VACUNADO PRIMERO DOSIS',
	        'OBSERVACIONES PRIMERA DOSIS',
	        'SEGUNDA DOSIS FECHA',
	        'SEGUNDA DOSIS HORA',
	        'DIGITADOR SEGUNDA DOSIS',
	        'EQUIPO VACUNADOR SEGUNDA DOSIS',
	        'VACUNADO SEGUNDA DOSIS',
	        'OBSERVACIONES SEGUNDA DOSIS',
	        'OBSERVACIONES GENERALES',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Persona::all();
        /**$personas = DB::table('personas')->select(
        	'institucion',
	        'consta_lista',
	        'eod',
	        'cedula',
	        'nombres',
	        'regimen_laboral',
	        'tipo_nombramiento',
	        'unidad_operativa',
	        'area',
	        'denominacion_puesto',
	        'fecha_nacimiento',
	        'telefono',
	        'gestacion',
	        'maternidad',
	        'lactancia',
	        'enfermedad_catastrofica',
	        'tipo',
	        'discapacidad',
	        'nivel_ocupacional',
	        'covid',
	        'provincia',
	        'ciudad',
	        'puesto_vacunacion',
	        'acepta_vacuna',
	        'primera_dosis_fecha',
	        'primera_dosis_hora',
	        'primera_usuario_digitador',
	        'primera_equipo_vacunador',
	        'primera_dosis_vacunado',
	        'primera_dosis_observacion',
	        'segunda_dosis_fecha',
	        'segunda_dosis_hora',
	        'segunda_usuario_digitador',
	        'segunda_equipo_vacunador',
	        'segunda_dosis_vacunado',
	        'segunda_dosis_observacion',
	        'observacion')->get();
        return $personas;
		**/

		$query = Persona::query();

        if ( $this->provincia && $this->provincia !== '' ){
            $query = $query->orWhere('personas.provincia', 'like', '%' . trim($request->input('provincia')) . '%');
        }

        if ( $this->ciudad &&  $this->ciudad !== '' ){
            $query = $query->orWhere('personas.ciudad', 'like', '%' . trim($request->input('ciudad')) . '%');
        }

        if ( $this->puesto_vacunacion && $this->puesto_vacunacion !== '' ){
            $query = $query->orWhere('personas.puesto_vacunacion', 'like', '%' . trim($request->input('puesto_vacunacion')) . '%');
        }

        $personas = $query->select(
        	'institucion',
	        'consta_lista',
	        'eod',
	        'cedula',
	        'nombres',
	        'regimen_laboral',
	        'tipo_nombramiento',
	        'unidad_operativa',
	        'area',
	        'denominacion_puesto',
	        'fecha_nacimiento',
	        'telefono',
	        'gestacion',
	        'maternidad',
	        'lactancia',
	        'enfermedad_catastrofica',
	        'tipo',
	        'discapacidad',
	        'nivel_ocupacional',
	        'covid',
	        'provincia',
	        'ciudad',
	        'puesto_vacunacion',
	        'acepta_vacuna',
	        'primera_dosis_fecha',
	        'primera_dosis_hora',
	        'primera_usuario_digitador',
	        'primera_equipo_vacunador',
	        'primera_dosis_vacunado',
	        'primera_dosis_observacion',
	        'segunda_dosis_fecha',
	        'segunda_dosis_hora',
	        'segunda_usuario_digitador',
	        'segunda_equipo_vacunador',
	        'segunda_dosis_vacunado',
	        'segunda_dosis_observacion',
	        'observacion')->distinct()->orderBy('personas.nombres', 'asc');

        return $personas;
    }
}
