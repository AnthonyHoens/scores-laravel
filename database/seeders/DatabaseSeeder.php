<?php

namespace Database\Seeders;

use App\Models\Participation;
use App\Models\Role;
use App\Models\Team;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            RoleUserSeeder::class,
            TeamSeeder::class,
            Participation::class,
        ]);
    }
}
