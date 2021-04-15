<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class StockDisponible
 * @package App\Models
 * @version April 9, 2021, 1:46 pm UTC
 *
 * @property string $lote
 * @property integer $cantidad_actual
 * @property string $institucion
 */
class StockDisponible extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'stock_disponibles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'lote',
        'cantidad_actual',
        'institucion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'lote' => 'string',
        'cantidad_actual' => 'integer',
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
