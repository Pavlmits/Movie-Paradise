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

     public function director() {
          return $this->belongsTo('App\Director');
     }
    public function genres(){
         return $this->hasMany('App\Genre');
    }
}
