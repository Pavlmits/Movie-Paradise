<?php

use Illuminate\Database\Seeder;
use App\Genre;
class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genre = new Genre();
        $genre->name = 'Comedy';
        $genre->save();

        $genre1 = new Genre();
        $genre1->name = 'Horror';
        $genre1->save();

        $genre2 = new Genre();
        $genre2->name = 'Romance';
        $genre2->save();

        $genre3 = new Genre();
        $genre3->name = 'Action';
        $genre3->save();

        $genre4 = new Genre();
        $genre4->name = 'Drama';
        $genre4->save();

        $genre5 = new Genre();
        $genre5->name = 'Animation';
        $genre5->save();

        $genre6 = new Genre();
        $genre6->name = 'Sci-Fi';
        $genre6->save();


    }
}
