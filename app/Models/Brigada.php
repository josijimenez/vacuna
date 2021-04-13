<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Brigada
 * @package App\Models
 * @version March 4, 2021, 2:13 pm UTC
 *
 * @property string $nombre
 * @property integer $punto_vacunacions_id
 */
class Brigada extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'brigadas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'punto_vacunacions_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'punto_vacunacions_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];


    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    **/
    public function punto_vacunacion()
    {
        return $this->belongsTo('\App\Models\Punto_vacunacion', 'punto_vacunacions_id');
    }


}
