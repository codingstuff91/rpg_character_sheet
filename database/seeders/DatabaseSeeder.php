<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\JaugeSeeder;
use Database\Seeders\CategorieSeeder;
use Database\Seeders\DisciplineSeeder;
use Database\Seeders\PersonnageSeeder;
use Database\Seeders\CaracteristiqueSeeder;
use Database\Seeders\Caracteristique_personnageSeeder;

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
            CaracteristiqueSeeder::class,
            Caracteristique_personnageSeeder::class,
            JaugeSeeder::class,
            DisciplineSeeder::class
        ]);
    }
}
