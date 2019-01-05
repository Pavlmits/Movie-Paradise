<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'id',
        'review'
    ];

    public function movie(){
        return $this->belongsTo('App\Movie');
    }
}
