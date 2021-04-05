<?php

namespace App\Repositories;

use App\Models\Brigada;
use App\Repositories\BaseRepository;

/**
 * Class BrigadaRepository
 * @package App\Repositories
 * @version March 4, 2021, 2:13 pm UTC
*/

class BrigadaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'punto_vacunacions_id'
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
        return Brigada::class;
    }
}
