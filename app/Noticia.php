<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 
        'user_id', 
        'titulo', 
        'cuerpo', 
        'imagen', 
        'fecha'
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
