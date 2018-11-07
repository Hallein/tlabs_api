<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 
        'user_id', 
        'nombre_beneficiario', 
        'fecha_entrega', 
        'nro_piezas', 
        'material', 
        'tiempo_estimado', 
        'fecha_solicitud', 
        'foto'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
