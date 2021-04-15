<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EgresoProducto
 * @package App\Models
 * @version April 9, 2021, 1:46 pm UTC
 *
 * @property string $lote
 * @property integer $cantidad_actual
 * @property string $institucion
 */
class EgresoProducto extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'egreso_productos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'cantidad',
        'lote',
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
        'cantidad' => 'integer',
        'lote' => 'string',
        'usuario' => 'string',
        'institucion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'lote' => 'required',
        
        'institucion' => 'required'
    ];

    
}
