<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Caracteristique_personnageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Création de valeurs de niveau de caracteristiques aléatoires
        for ($i=1; $i < 15 ; $i++) { 
            DB::table('caracteristique_personnage')->insert([
                "personnage_id" => 1,
                "caracteristique_id" => $i,
                "niveau" => rand(1,5)
            ]);
        }
    }
}
