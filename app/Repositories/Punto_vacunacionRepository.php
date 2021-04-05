<?php

namespace App\Repositories;

use App\Models\Punto_vacunacion;
use App\Repositories\BaseRepository;

/**
 * Class Punto_vacunacionRepository
 * @package App\Repositories
 * @version March 4, 2021, 1:39 pm UTC
*/

class Punto_vacunacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
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
        return Punto_vacunacion::class;
    }
}
