<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            'name' => 'Liverpool',
            'slug' => 'LIV',
            'file_name' => 'liverpool.png',
        ]);
        Team::create([
            'name' => 'Leicester',
            'slug' => 'LEI',
            'file_name' => 'leicester.png',
        ]);
        Team::create([
            'name' => 'Chelsea',
            'slug' => 'CHE',
            'file_name' => 'chelsea.png',
        ]);
        Team::create([
            'name' => 'Tottenham',
            'slug' => 'TOT',
            'file_name' => 'tottenham.png',
        ]);
        Team::create([
            'name' => 'Manchester City',
            'slug' => 'MAC',
            'file_name' => 'manchester_city.png',
        ]);
        Team::create([
            'name' => 'Aston Villa',
            'slug' => 'ASV',
            'file_name' => 'aston_villa.png',
        ]);
        Team::create([
            'name' => 'Newcastle',
            'slug' => 'NEW',
            'file_name' => 'newcastle.png',
        ]);
        Team::create([
            'name' => 'Everton',
            'slug' => 'EVE',
            'file_name' => 'everton.png',
        ]);
    }
}
