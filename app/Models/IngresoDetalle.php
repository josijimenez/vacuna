<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class IngresoDetalle
 * @package App\Models
 * @version April 8, 2021, 5:10 pm UTC
 *
 * @property string $numero_comprobante
 * @property string $fecha_emision
 * @property number $subtotal
 * @property number $iva
 * @property number $total
 * @property string $observacion
 * @property string $recibidoconforme
 * @property string $puestorecibidoconforme
 * @property string $entregadoconforme
 * @property string $puestoentregadoconforme
 * @property string $id_institucion
 * @property string $usuario
 */
class IngresoDetalle extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'ingreso_detalles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'numero_comprobante' => 'string',
        'fecha_emision' => 'date',
        'subtotal' => 'float',
        'iva' => 'float',
        'total' => 'float',
        'observacion' => 'string',
        'recibidoconforme' => 'string',
        'puestorecibidoconforme' => 'string',
        'entregadoconforme' => 'string',
        'puestoentregadoconforme' => 'string',
        'id_institucion' => 'string',
        'usuario' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'numero_comprobante' => 'required',
        'fecha_emision' => 'required',
        'subtotal' => 'required',
        'iva' => 'required',
        'total' => 'required',
        'id_institucion' => 'required',
            'recibidoconforme' => 'required',
            'puestorecibidoconforme' => 'required',
            'entregadoconforme' => 'required',
            'puestoentregadoconforme' => 'required'
    ];

    
}
