<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class IngresoProducto
 * @package App\Models
 * @version April 9, 2021, 3:44 am UTC
 *
 * @property int $cantidad
 * @property number $precio_unitario
 * @property number $subtotal
 * @property string $lote
 */
class IngresoProducto extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'ingreso_productos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'cantidad',
        'precio_unitario',
        'subtotal',
        'lote',
        'id_ingreso_detalle',
        'usuario',
        'institucion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'precio_unitario' => 'float',
        'subtotal' => 'float',
        'lote' => 'string',
        'id_ingreso_detalle' => 'integer',
        'usuario' => 'string',
        'institucion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cantidad' => 'required',
        'precio_unitario' => 'required',
        'subtotal' => 'required',
        'lote' => 'required',
        'id_ingreso_detalle' => 'required',
        'institucion'=>'required'
    ];

    
}
