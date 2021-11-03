<?php

namespace Database\Seeders;

use App\Models\Caracteristique;
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

        // Valeur aléatoire de score d'humanité
        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Humanité')->get()->first()->id,
            "niveau" => 8
        ]);
        
        // Valeur aléatoire de soif
        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Soif')->get()->first()->id,
            "niveau" => 2
        ]);

        // Valeur aléatoire de puissance de sang
        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Puissance du sang')->get()->first()->id,
            "niveau" => 1
        ]);

        // Valeur aléatoire de coup de sang
        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Coup de sang')->get()->first()->id,
            "niveau" => "+1 dé"
        ]);

        // Valeur aléatoire de coup de sang
        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Dégats régénérés')->get()->first()->id,
            "niveau" => "1 dégat superficiel / tour"
        ]);

        // Valeur aléatoire de coup de sang
        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Bonus aux pouvoirs')->get()->first()->id,
            "niveau" => "N/A"
        ]);

        // Valeur aléatoire de coup de sang
        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Test d\'exaltation')->get()->first()->id,
            "niveau" => "1D10"
        ]);

        // Valeur aléatoire de coup de sang
        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Pénalité pour se nourrir')->get()->first()->id,
            "niveau" => "N/A"
        ]);

        // Valeur aléatoire de coup de sang
        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Score de fléau')->get()->first()->id,
            "niveau" => "1"
        ]);
    }
}