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
        /**
         * VALEURS D'ATTRIBUTS
         */
        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Force')->get()->first()->id,
            "niveau" => 3
        ]);

        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Dexterité')->get()->first()->id,
            "niveau" => 4
        ]);

        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Vigueur')->get()->first()->id,
            "niveau" => 5
        ]);

        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Charisme')->get()->first()->id,
            "niveau" => 3
        ]);

        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Manipulation')->get()->first()->id,
            "niveau" => 4
        ]);

        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Sang-froid')->get()->first()->id,
            "niveau" => 5
        ]);
        
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