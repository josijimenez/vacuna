<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'identificacion',
        'email',
        'telefono',
        'password',
        'type',
        'institucion_id',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'institucion_id' => 'integer',
    ];


    public function isAdmin() {
        if($this->type == 'ADMINISTRADOR')
        return true;
    }

    public function isRegister() {
        if($this->type == 'REGISTRADOR')
        return true;
    }

    public function isVaccinator() {
        if($this->type == 'VACUNADOR')
            return true;
    }

    public function isAdminOrRegister() {
        if($this->type == 'ADMINISTRADOR' || $this->type == 'REGISTRADOR')
        return true;
    }

    public function isAdminOrVaccinator() {
        if($this->type == 'ADMINISTRADOR' || $this->type == 'VACUNADOR')
        return true;
    }

    public function isAll() {
        if($this->type == 'ADMINISTRADOR' || $this->type == 'REGISTRADOR' || $this->type == 'VACUNADOR')
        return true;
    }


    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    **/
    public function institucion()
    {
        return $this->belongsTo('\App\Models\Institucion', 'institucion_id');
    }
    

}
