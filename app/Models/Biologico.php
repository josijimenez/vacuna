<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Biologico
 * @package App\Models
 * @version April 7, 2021, 9:21 pm UTC
 *
 * @property string $lote
 * @property string $marca
 * @property string $fecha_caducidad
 * @property string $codigo_cum
 * @property string $descripcion
 */
class Biologico extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'biologicos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'lote',
        'marca',
        'fecha_caducidad',
        'codigo_cum',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'lote' => 'string',
        'marca' => 'string',
        'fecha_caducidad' => 'date',
        'codigo_cum' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'lote' => 'required',
        'marca' => 'required',
        'fecha_caducidad' => 'required',
        'codigo_cum' => 'required'
    ];

    
}
