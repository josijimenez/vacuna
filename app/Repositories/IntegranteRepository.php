<?php

namespace App\Repositories;

use App\Models\Integrante;
use App\Repositories\BaseRepository;

/**
 * Class IntegranteRepository
 * @package App\Repositories
 * @version April 8, 2021, 6:09 pm UTC
*/

class IntegranteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo',
        'integrante_user_id',
        'estado'
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
        return Integrante::class;
    }
}
