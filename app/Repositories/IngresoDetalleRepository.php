<?php

namespace App\Repositories;

use App\Models\IngresoDetalle;
use App\Repositories\BaseRepository;

/**
 * Class IngresoDetalleRepository
 * @package App\Repositories
 * @version April 8, 2021, 5:10 pm UTC
*/

class IngresoDetalleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'numero_comprobante',
        'fecha_emision',
        'subtotal',
        'iva',
        'total',
        'observacion',
        'recibidoconforme',
        'puestorecibidoconforme',
        'entregadoconforme',
        'puestoentregadoconforme',
        'id_institucion',
        'usuario'
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
        return IngresoDetalle::class;
    }
}
