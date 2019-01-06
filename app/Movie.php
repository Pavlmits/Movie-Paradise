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

     public function director()
      {
          return $this->belongsTo('App\Director','movie_director','movie_id','director_id');
     }
    public function stars()
    {
        return $this->belongsToMany('App\Star','movie_star','movie_id','star_id');
    }
    public function users()
    {
        return $this->belongsToMany('App\User','user_movie','movie_id','user_id');
    }
    public function genres()
    {
        return $this->belongsToMany('App\Genre','movie_genre','movie_id','genre_id');
    }
}
