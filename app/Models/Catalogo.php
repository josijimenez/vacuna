<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Catalogo
 * @package App\Models
 * @version March 4, 2021, 8:26 pm UTC
 *
 * @property string $nombre
 */
class Catalogo extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'catalogos';
    

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


     /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    **/
    public function items()
    {
        return $this->hasMany('\App\Models\Item', 'catalogos_id');
    }
    
}
