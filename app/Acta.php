<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acta extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'guia', 
        'fecha', 
        'lugar', 
        'foto', 
        'estado'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function user()
    {
      return $this->belongsTo('App\User', 'guia');
    }
    
    public function participantes()
    {
        return $this->belongsToMany('App\User', 'participantes')->withPivot('firmado');
    }

    public function temas()
    {
      return $this->hasMany('App\Tema');
    }

    public function acuerdos()
    {
      return $this->hasMany('App\Acuerdo');
    }
}
