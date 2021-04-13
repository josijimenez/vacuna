<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Integrante
 * @package App\Models
 * @version April 8, 2021, 6:09 pm UTC
 *
 * @property string $tipo
 * @property integer $integrante_user_id
 * @property string $estado
 */
class Integrante extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'integrantes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'tipo',
        'integrante_user_id',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tipo' => 'string',
        'integrante_user_id' => 'integer',
        'estado' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipo' => 'required',
        'integrante_user_id' => 'required',
        'estado' => 'required'
    ];

     /**
     * Get the user user.
     */
    public function user()
    {
        return $this->hasOne('\App\Models\User');    
    }


}
