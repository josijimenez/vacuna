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
        'nombre',
        'unicodigo',
        'establecimiento',
        'zona',
        'distrito',
        'provincia',
        'canton',
        'institucions_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'unicodigo' => 'string',
        'establecimiento' => 'string',
        'zona' => 'string',
        'distrito' => 'string',
        'provincia' => 'string',
        'canton' => 'string',
        'institucions_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
     public function scopeByUser($query, User $user)
    {
        // If the user is not an admin, show articles by their department.
        // Chaining another where(column, condition) results in an AND in
        // the WHERE clause
        if (!$user->isAdmin()) {
            // WHERE department = X AND another_column = another_value
            return $query->where('institucions_id', $user->institucion_id);
        }

        // If the user is an admin, don't add any extra where clauses, so everything is returned.
        return $query;
    }


    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    **/
    public function institucion()
    {
        return $this->belongsTo('\App\Models\Institucion', 'institucions_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    **/
    public function brigadas()
    {
        return $this->hasMany('\App\Models\Brigada', 'punto_vacunacions_id');
    }

}
