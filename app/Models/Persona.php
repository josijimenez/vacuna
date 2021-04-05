<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Persona
 * @package App\Models
 * @version March 4, 2021, 12:47 am UTC
 *
 * @property string $tipo_institucion
 * @property string $institucion
 * @property string $consta_lista
 * @property string $cedula
 * @property string $nombres
 * @property string $profrsion
 * @property string $area
 * @property string $denominacion_puesto
 * @property date $fecha_nacimiento
 * @property string $telefono
 * @property string $covid
 * @property date $fecha_covid
 * @property string $primera_vacunado
 * @property string $primera_farmaceutica
 * @property string $primera_provincia
 * @property string $primera_ciudad
 * @property string $primera_puesto
 * @property string $primera_equipo
 * @property date $primera_fecha
 * @property time $primera_hora
 * @property string $primera_digitador
 * @property string $primera_observacion
 * @property string $segunda_vacunado
 * @property string $segunda_farmaceutica
 * @property string $segunda_provincia
 * @property string $segunda_ciudad
 * @property string $segunda_puesto
 * @property string $segunda_equipo
 * @property date $segunda_fecha
 * @property time $segunda_hora
 * @property string $segunda_digitador
 * @property string $segunda_observacion
 * @property string $observacion
 */
class Persona extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'personas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'tipo_institucion',
        'institucion',
        'cedula',
        'nombres',
        'profesion',
        'area',
        'puesto',
        'fecha_nacimiento',
        'telefono',
        'covid',
        'fecha_covid',
        'digitador',
        'primera_vacunado',
        'primera_farmaceutica',
        'primera_provincia',
        'primera_ciudad',
        'primera_puesto',
        'primera_fecha',
        'primera_hora',
        'primera_observacion',
        'segunda_vacunado',
        'segunda_farmaceutica',
        'segunda_provincia',
        'segunda_ciudad',
        'segunda_puesto',
        'segunda_fecha',
        'segunda_hora',
        'segunda_observacion',
        'observacion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tipo_institucion' => 'string',
        'institucion' => 'string',
        'cedula' => 'string',
        'nombres' => 'string',
        'profesion' => 'string',
        'area' => 'string',
        'puesto' => 'string',
        'fecha_nacimiento' => 'date',
        'telefono' => 'string',
        'covid' => 'string',
        'fecha_covid' => 'date',
        'digitador' => 'string',
        'primera_vacunado' => 'string',
        'primera_farmaceutica' => 'string',
        'primera_provincia' => 'string',
        'primera_ciudad' => 'string',
        'primera_puesto' => 'string',
        'primera_fecha' => 'date',
        'primera_hora' => 'string',
        'primera_observacion' => 'string',
        'segunda_vacunado' => 'string',
        'segunda_farmaceutica' => 'string',
        'segunda_provincia' => 'string',
        'segunda_ciudad' => 'string',
        'segunda_puesto' => 'string',
        'segunda_fecha' => 'date',
        'segunda_hora' => 'string',
        'segunda_observacion' => 'string',
        'observacion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
