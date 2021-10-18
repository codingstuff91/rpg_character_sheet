<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Caracteristique;
use Illuminate\Database\Seeder;

class CaracteristiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Attributs_physiques')->get()->first()->id,
            'nom' => 'Force',
            'description' => 'La force physique du personnage',
        ]);

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Attributs_physiques')->get()->first()->id,
            'nom' => 'Dexterité',
            'description' => 'L\'agilité physique du personnage',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Attributs_physiques')->get()->first()->id,
            'nom' => 'Vigueur',
            'description' => 'La capacité du personnage a encaisser des coups',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Attributs_mentaux')->get()->first()->id,
            'nom' => 'Charisme',
            'description' => 'Texte à saisir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Attributs_mentaux')->get()->first()->id,
            'nom' => 'Manipulation',
            'description' => 'Texte à saisir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Attributs_mentaux')->get()->first()->id,
            'nom' => 'Apparence',
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
            'nom' => 'Commandement',
            'description' => 'Texte à saisir',
        ]);
        
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
