<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acuerdo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'acta_id', 
        'acuerdo'
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
