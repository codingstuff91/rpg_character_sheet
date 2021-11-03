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
         * CAPACITES - PHYSIQUES
         */
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_talents')->get()->first()->id,
            'nom' => 'Armes à feu',
            'description' => 'Texte à saisir',
        ]);

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_talents')->get()->first()->id,
            'nom' => 'Artisanat',
            'description' => 'Texte à saisir',
        ]);
        
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
            'nom' => 'Conduite',
            'description' => 'Texte à saisir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_talents')->get()->first()->id,
            'nom' => 'Furtivité',
            'description' => 'Texte à saisir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_talents')->get()->first()->id,
            'nom' => 'Larcin',
            'description' => 'Texte à saisir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_talents')->get()->first()->id,
            'nom' => 'Mélée',
            'description' => 'Texte à saisir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_talents')->get()->first()->id,
            'nom' => 'Survie',
            'description' => 'Texte à saisir',
        ]);

        /**
         * CAPACITES - SOCIALES
         */
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_compétences')->get()->first()->id,
            'nom' => 'Animaux',
            'description' => 'Texte à saisir',
        ]);

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_compétences')->get()->first()->id,
            'nom' => 'Commandement',
            'description' => 'Texte à saisir',
        ]);

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_compétences')->get()->first()->id,
            'nom' => 'Empathie',
            'description' => 'Texte à saisir',
        ]);

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_compétences')->get()->first()->id,
            'nom' => 'Etiquette',
            'description' => 'Texte à saisir',
        ]);

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_compétences')->get()->first()->id,
            'nom' => 'Experience de la rue',
            'description' => 'Texte à saisir',
        ]);

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_compétences')->get()->first()->id,
            'nom' => 'Intimidation',
            'description' => 'Texte à saisir',
        ]);

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_compétences')->get()->first()->id,
            'nom' => 'Performance',
            'description' => 'Texte à saisir',
        ]);

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_compétences')->get()->first()->id,
            'nom' => 'Persuasion',
            'description' => 'Texte à saisir',
        ]);

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_compétences')->get()->first()->id,
            'nom' => 'Subterfuge',
            'description' => 'Texte à saisir',
        ]);

        /**
         * CAPACITES - MENTALES
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
