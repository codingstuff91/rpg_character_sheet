<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CategorieSeeder;
use Database\Seeders\PersonnageSeeder;
use Database\Seeders\CaracteristiqueSeeder;

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
            PersonnageSeeder::class,
            CategorieSeeder::class,
            CaracteristiqueSeeder::class
        ]);
    }
}
