<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Hoens Anthony',
            'slug' => 'hoens_anthony',
            'emails' => 'anthony.hoens@student.hepl.be',
            'image' => 'hoens_anthony.jpg',
            'password' => Hash::make('anthony'),
        ]);

        User::factory(5)->create();
    }
}
