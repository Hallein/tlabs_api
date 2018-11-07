<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'acta_id', 
        'tema'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function acta()
    {
      return $this->belongsTo('App\Acta');
    }
}
