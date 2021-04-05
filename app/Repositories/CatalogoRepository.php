<?php

namespace App\Repositories;

use App\Models\Catalogo;
use App\Repositories\BaseRepository;

/**
 * Class CatalogoRepository
 * @package App\Repositories
 * @version March 4, 2021, 8:26 pm UTC
*/

class CatalogoRepository extends BaseRepository
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
        return Catalogo::class;
    }
}
