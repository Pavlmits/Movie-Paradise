<?php

use Illuminate\Database\Seeder;
use App\Movie;
use App\Genre;
class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genre =Genre::where('name','Romance')->first();
        $movie = new Movie();
        $movie->title =' Love Actually';
        $movie->year =' 2003';
        $movie->duration ='135 min';
        $movie->language ='English';
        $movie->photo =' https://m.media-amazon.com/images/M/MV5BMTY4NjQ5NDc0Nl5BMl5BanBnXkFtZTYwNjk5NDM3._V1_.jpg';
        $movie->plot ='Follows the lives of eight very different couples in dealing with their love lives in various loosely interrelated tales all set during a frantic month before Christmas in London, England.';
        $movie->trailer = 'https://www.youtube.com/watch?v=fOS-HMiVejo';
        $movie->save();
        $movie->genres()->attach($genre);

    }
}
