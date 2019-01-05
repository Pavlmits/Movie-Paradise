<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable = [
        'id',
        'title',
        'noEpisodes',
        'year',
        'duration',
        'genre',
        'language',
        'photo',
        'plot',
        'trailer'
    ];

}
