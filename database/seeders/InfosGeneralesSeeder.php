<?php

namespace Database\Seeders;

use App\Models\Caracteristique;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfosGeneralesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Nom')->get()->first()->id,
            "niveau" => "Nosfé"
        ]);

        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Chronique')->get()->first()->id,
            "niveau" => "Angers By Night"
        ]);

        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Sire')->get()->first()->id,
            "niveau" => "Inconnu"
        ]);

        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Concept')->get()->first()->id,
            "niveau" => "Etudiant"
        ]);

        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Clan')->get()->first()->id,
            "niveau" => "Assamite"
        ]);

        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Génération')->get()->first()->id,
            "niveau" => 12
        ]);

        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Ambition')->get()->first()->id,
            "niveau" => "Trouver le sire qui l'a crée"
        ]);

        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Désir')->get()->first()->id,
            "niveau" => "Se nourrir sur un drogué"
        ]);
    }
}
