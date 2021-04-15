<?php

namespace App\Repositories;

use App\Models\IngresoProducto;
use App\Repositories\BaseRepository;

/**
 * Class IngresoProductoRepository
 * @package App\Repositories
 * @version April 9, 2021, 3:44 am UTC
*/

class IngresoProductoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cantidad',
        'precio_unitario',
        'subtotal',
        'lote',
        'id_ingreso_detalle',
        'usuario',
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
        return IngresoProducto::class;
    }
}
