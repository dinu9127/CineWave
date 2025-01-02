<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run()
    {
        // Using firstOrCreate to avoid duplicates based on name and movie_date
        Movie::firstOrCreate([
            'name' => 'Intersteller',
            'movie_date' => '2024-12-30',
        ], [
            'start_time' => '18:00:00',
            'writer' => 'Christopher Nolan',
            'description' => 'Science fiction film where a group of astronauts embarks on a journey through a wormhole to find a new planet for humanity, exploring themes of love, time, and sacrifice.',
            'seats_available' => 100,
            'poster_url' => 'images/interstellar.jpg' 
        ]);

        Movie::firstOrCreate([
            'name' => 'Mandara',
            'movie_date' => '2024-12-31',
        ], [
            'start_time' => '20:00:00',
            'writer' => 'Priyantha Colombage',
            'description' => 'Sinhala drama film that explores the complexities of human relationships, culture, and personal growth.',
            'seats_available' => 150,
            'poster_url' => 'images/mandara.jpg' 
        ]);

        Movie::firstOrCreate([
            'name' => 'Three Idiots',
            'movie_date' => '2024-12-29',
        ], [
            'start_time' => '15:00:00',
            'writer' => 'Chetan Bhagat',
            'description' => 'A comedy-drama film about three engineering students and their journey.',
            'seats_available' => 120,
            'poster_url' => 'images/3idiots.jpeg'
        ]);

        Movie::firstOrCreate([
            'name' => 'Avatar',
            'movie_date' => '2024-12-27',
        ], [
            'start_time' => '18:00:00',
            'writer' => 'James Cameron',
            'description' => 'A visually stunning science fiction epic set in the alien world of Pandora.',
            'seats_available' => 150,
            'poster_url' => 'images/avatar.jpeg'
        ]);

        Movie::firstOrCreate([
            'name' => 'Cinderella',
            'movie_date' => '2024-12-30',
        ], [
            'start_time' => '14:00:00',
            'writer' => 'Charles Perrault',
            'description' => 'A fairy tale about a young girl who overcomes her hardships with the help of magic.',
            'seats_available' => 100,
            'poster_url' => 'images/cinderella.jpeg'
        ]);
        Movie::firstOrCreate([
            'name' => 'Spiderman',
            'movie_date' => '2024-12-29',
        ], [
            'start_time' => '17:00:00',
            'writer' => 'Stan Lee, Steve Ditko',
            'description' => 'A superhero film about a young man who gains spider-like abilities and fights crime.',
            'seats_available' => 130,
            'poster_url' => 'images/spiderman.jpeg'
        ]);
    }
}
