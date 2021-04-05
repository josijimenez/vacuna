<?php

namespace App\Repositories;

use App\Models\Dosis;
use App\Repositories\BaseRepository;

/**
 * Class DosisRepository
 * @package App\Repositories
 * @version March 17, 2021, 2:07 am UTC
*/

class DosisRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'puesto',
        'vacuna',
        'catidad',
        'fecha'
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
        return Dosis::class;
    }
}
