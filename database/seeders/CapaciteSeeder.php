<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Caracteristique;
use Illuminate\Database\Seeder;

class CapaciteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * CAPACITES - TALENTS
         */
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_talents')->get()->first()->id,
            'nom' => 'Athlétisme',
            'description' => 'Texte à saisir',
        ]);

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_talents')->get()->first()->id,
            'nom' => 'Bagarre',
            'description' => 'Texte à saisir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_talents')->get()->first()->id,
            'nom' => 'Commandement',
            'description' => 'Texte à saisir',
        ]);

        /**
         * CAPACITES - COMPETENCES
         */
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_compétences')->get()->first()->id,
            'nom' => 'Animaux',
            'description' => 'Texte à saisir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_compétences')->get()->first()->id,
            'nom' => 'Armes à feu',
            'description' => 'Texte à saisir',
        ]);

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_compétences')->get()->first()->id,
            'nom' => 'Artisanats',
            'description' => 'Texte à saisir',
        ]);

        /**
         * CAPACITES - CONNAISSANCES
         */
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_connaissances')->get()->first()->id,
            'nom' => 'Droit',
            'description' => 'Texte à saisir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_connaissances')->get()->first()->id,
            'nom' => 'Erudition',
            'description' => 'Texte à saisir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_connaissances')->get()->first()->id,
            'nom' => 'Finances',
            'description' => 'Texte à saisir',
        ]);
    }
}
