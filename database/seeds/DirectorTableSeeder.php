<?php

use Illuminate\Database\Seeder;
use App\Director;

class DirectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $director = new Director();
        $director->name = 'James Cameron';
        $director->bio = 'James Francis Cameron was born on August 16, 1954 in Kapuskasing, Ontario, Canada. He moved to the United States in 1971.';
        $director->photo ='https://m.media-amazon.com/images/M/MV5BMjI0MjMzOTg2MF5BMl5BanBnXkFtZTcwMTM3NjQxMw@@._V1_.jpg';
        $director->save();
    }
}
