<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Caracteristique;
use Illuminate\Database\Seeder;

class InfosSangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Sang')->get()->first()->id,
            'nom' => 'Soif',
            'description' => 'La représentation de la soif du personnage',
        ]); 

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Sang')->get()->first()->id,
            'nom' => 'Puissance du sang',
            'description' => 'La représentation de la soif du personnage',
        ]); 
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Sang')->get()->first()->id,
            'nom' => 'Coup de sang',
            'description' => 'Texte à saisir',
        ]);        

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Sang')->get()->first()->id,
            'nom' => 'Dégats régénérés',
            'description' => 'Le nombre de dégats superficiels qui peuvent être récupérés par le personnage',
        ]);        

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Sang')->get()->first()->id,
            'nom' => 'Bonus aux pouvoirs',
            'description' => 'Description à saisir',
        ]);  

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Sang')->get()->first()->id,
            'nom' => 'Test d\'exaltation',
            'description' => 'Description à saisir',
        ]);  

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Sang')->get()->first()->id,
            'nom' => 'Pénalité pour se nourrir',
            'description' => 'Description à saisir',
        ]);  

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Sang')->get()->first()->id,
            'nom' => 'Score de fléau',
            'description' => 'Description à saisir',
        ]);  
    }
}
