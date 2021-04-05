<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Item
 * @package App\Models
 * @version March 4, 2021, 8:27 pm UTC
 *
 * @property string $nombre
 * @property integer $catalogos_id
 */
class Item extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'items';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'catalogos_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'catalogos_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'catalogos_id' => 'required'
    ];


    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    **/
    public function catalogo()
    {
        return $this->belongsTo('\App\Models\Catalogo', 'catalogos_id');
    }
    
}
