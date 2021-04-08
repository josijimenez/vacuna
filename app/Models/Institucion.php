<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Institucion
 * @package App\Models
 * @version April 6, 2021, 9:28 pm UTC
 *
 * @property string $nombre
 * @property string $tipo
 * @property string $categoria
 * @property string $ubicacion
 */
class Institucion extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'institucions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'tipo',
        'categoria',
        'ubicacion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'tipo' => 'string',
        'categoria' => 'string',
        'ubicacion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required'
    ];

    
}
