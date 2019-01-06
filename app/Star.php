<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    protected $fillable = [

        'id',
        'name',
        'bio',
        'photo'
    ];

    public function movie(){
        return $this->belongsTo('App\Movie','movie_star','star_id','movie_id');
    }
}
