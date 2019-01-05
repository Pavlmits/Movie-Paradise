<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'id',
        'title',
        'year',
        'duration',
        'language',
        'photo',
        'plot',
        'trailer'
      ];

    public function reviews(){
         return $this->hasMany('App\Reviews');
    }
    public function photos(){
         return $this->hasMany('App\Stars');
    }
    public function genres(){
         return $this->hasMany('App\Genre');
    }
}
