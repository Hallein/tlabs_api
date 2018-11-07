<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'username', 'nombre', 'tipo', 'foto_perfil'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function comprobantes()
    {
      return $this->hasMany('App\Comprobante');
    }

    public function actas()
    {
      return $this->hasMany('App\Acta', 'guia');
    }
    
    public function participantes()
    {
        return $this->belongsToMany('App\Acta', 'participantes')->withPivot('firmado');
    }
}
