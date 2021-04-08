<?php

namespace App\Repositories;

use App\Models\Biologico;
use App\Repositories\BaseRepository;

/**
 * Class BiologicoRepository
 * @package App\Repositories
 * @version April 7, 2021, 9:21 pm UTC
*/

class BiologicoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'lote',
        'marca',
        'fecha_caducidad',
        'codigo_cum',
        'descripcion'
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
        return Biologico::class;
    }
}
