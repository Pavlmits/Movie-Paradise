<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable =[
        'name'
    ];

    public function movies()
    {
        return $this->belongsToMany('App\Movie','movie_genre','genre_id','movie_id');
    }
}
