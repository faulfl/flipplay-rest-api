<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user1 = User::factory()->create([
            'name'  => 'Faul Cahyaditya',
            'email' => 'faul@flipplay.test',
        ]);

        $user2 = User::factory()->create([
            'name'  => 'Budi Santoso',
            'email' => 'budi@flipplay.test',
        ]);

        $movie = Media::create([
            'title'            => 'Spider-Man 2',
            'type'             => 'Film',
            'genre'            => 'Action',
            'release_year'     => 2004,
            'duration_minutes' => 127,
        ]);

        $series = Media::create([
            'title'          => 'Arcane',
            'type'           => 'Serial',
            'genre'          => 'Animation',
            'release_year'   => 2021,
            'total_episodes' => 18,
        ]);

        $user1->media()->attach([$movie->id, $series->id]);
    }
}
