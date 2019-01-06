<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $fillable =[
        
        'name',
        'bio',
        'photo'
    ];

    public function movies(){
        return $this->hasMany('App\Movie','movie_director','director_id','movie_id');
    }
}
