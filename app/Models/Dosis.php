<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Dosis
 * @package App\Models
 * @version March 17, 2021, 2:07 am UTC
 *
 * @property string $puesto
 * @property string $farmaceutica
 * @property integer $cantidad
 * @property string $fecha
 */
class Dosis extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'dosis';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'puesto',
        'farmaceutica',
        'cantidad',
        'fecha'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'puesto' => 'string',
        'farmaceutica' => 'string',
        'cantidad' => 'integer',
        'fecha' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'puesto' => 'required',
        'farmaceutica' => 'required',
        'cantidad' => 'required|numeric',
        'fecha' => 'required'
    ];

    
}
