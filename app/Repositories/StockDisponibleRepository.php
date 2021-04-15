<?php

namespace App\Repositories;

use App\Models\StockDisponible;
use App\Repositories\BaseRepository;

/**
 * Class StockDisponibleRepository
 * @package App\Repositories
 * @version April 9, 2021, 1:46 pm UTC
*/

class StockDisponibleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'lote',
        'cantidad_actual',
        'institucion'
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
        return StockDisponible::class;
    }
}
