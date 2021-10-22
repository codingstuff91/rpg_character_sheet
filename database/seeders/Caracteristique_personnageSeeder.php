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
        // Création de valeurs de caracteristique pour les infos générales
        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => 1,
            "niveau" => "Nosfé"
        ]);

        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => 2,
            "niveau" => "Angers By night"
        ]);

        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => 3,
            "niveau" => "Inconnu"
        ]);

        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => 4,
            "niveau" => "Etudiant"
        ]);

        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => 5,
            "niveau" => "Trouver son sire et le tuer"
        ]);

        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => 6,
            "niveau" => "Trouver son sire et le tuer"
        ]);

        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => 7,
            "niveau" => "Chasseur"
        ]);

        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => 8,
            "niveau" => "Assamite"
        ]);

        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => 9,
            "niveau" => 12
        ]);

        // Création de valeurs de niveau de caracteristiques aléatoires
        for ($i=10; $i < 28 ; $i++) { 
            DB::table('caracteristique_personnage')->insert([
                "personnage_id" => 1,
                "caracteristique_id" => $i,
                "niveau" => rand(0,5)
            ]);
        }
    }
}