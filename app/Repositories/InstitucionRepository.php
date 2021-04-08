<?php

namespace App\Repositories;

use App\Models\Institucion;
use App\Repositories\BaseRepository;

/**
 * Class InstitucionRepository
 * @package App\Repositories
 * @version April 6, 2021, 9:28 pm UTC
*/

class InstitucionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'tipo',
        'categoria',
        'ubicacion'
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
        return Institucion::class;
    }
}
