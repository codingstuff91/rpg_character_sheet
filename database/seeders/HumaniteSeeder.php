<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Caracteristique;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HumaniteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Humanité')->get()->first()->id,
            'nom' => 'Humanité',
            'description' => 'Description a saisir',
        ]);

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Humanité')->get()->first()->id,
            'nom' => 'Flétrissures',
            'description' => 'Description a saisir',
        ]);

        // Valeur aléatoire de score d'humanité
        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Humanité')->get()->first()->id,
            "niveau" => 7
        ]);

        // Valeur aléatoire de score d'humanité
        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Flétrissures')->get()->first()->id,
            "niveau" => 1
        ]);
    }
}
