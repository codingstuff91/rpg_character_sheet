<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\JaugeSeeder;
use Database\Seeders\CapaciteSeeder;
use Database\Seeders\CategorieSeeder;
use Database\Seeders\InfosSangSeeder;
use Database\Seeders\DisciplineSeeder;
use Database\Seeders\PersonnageSeeder;
use Database\Seeders\CaracteristiqueSeeder;
use Database\Seeders\AvantageHandicapSeeder;
use Database\Seeders\DisciplinePersonnageSeeder;
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
            CapaciteSeeder::class,
            InfosSangSeeder::class,
            InfosGeneralesSeeder::class,
            Caracteristique_personnageSeeder::class,
            JaugeSeeder::class,
            DisciplineSeeder::class,
            DisciplinePersonnageSeeder::class,
            AvantageHandicapSeeder::class
        ]);
    }
}
