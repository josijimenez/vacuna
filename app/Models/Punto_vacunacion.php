<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Punto_vacunacion
 * @package App\Models
 * @version March 4, 2021, 1:39 pm UTC
 *
 * @property string $nombre
 */
class Punto_vacunacion extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'punto_vacunacions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
