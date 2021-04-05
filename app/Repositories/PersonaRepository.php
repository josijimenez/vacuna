<?php

namespace App\Repositories;

use App\Models\Persona;
use App\Repositories\BaseRepository;

/**
 * Class PersonaRepository
 * @package App\Repositories
 * @version March 4, 2021, 12:47 am UTC
*/

class PersonaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'institucion',
        'consta_lista',
        'eod',
        'cedula',
        'nombres',
        'regimen_laboral',
        'modalidad_laboral',
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
        'cambio_administrativo',
        'area_labora',
        'nivel_ocupacional',
        'covid',
        'acepta_vacuna',
        'usuario_digitador',
        'puesto_vacunacion',
        'primera_dosis_fecha',
        'primera_dosis_hora',
        'primera_equipo_vacunador',
        'primera_dosis_vacunado',
        'segunda_dosis_fecha',
        'segunda_dosis_hora',
        'segunda_equipo_vacunador',
        'segunda_dosis_vacunado'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Persona::class;
    }
}
