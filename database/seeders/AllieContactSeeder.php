<?php

namespace Database\Seeders;

use App\Models\AllieContact;
use Illuminate\Database\Seeder;

class AllieContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Création de 2 alliés
        AllieContact::create([
            'personnage_id' => 1,
            'type' => "allié",
            'nom' => 'John Papa',
            'metier' => 'Comissaire de police',
            'efficacite' => 2,
            'fiabilite' => 2,
            'details' => '<p>Un descriptif très détaillé de la relation avec cet allié</p><p>Ce texte doit comporter quelques détails mais pas trop</p>',
        ]);

        AllieContact::create([
            'personnage_id' => 1,
            'type' => "allié",
            'nom' => 'Le gros Tony',
            'metier' => 'Dealeur de rue',
            'efficacite' => 1,
            'fiabilite' => 1,
            'details' => '<p>Un descriptif très détaillé de la relation avec cet allié</p><p>Ce texte doit comporter quelques détails mais pas trop</p>',
        ]);
        
        //Création de contacts
        AllieContact::create([
            'personnage_id' => 1,
            'type' => "contact",
            'nom' => 'John Snow',
            'metier' => 'Combattant de MMA',
            'efficacite' => 3,
            'fiabilite' => 3,
            'details' => '<p>Un descriptif très détaillé de la relation avec cet allié</p><p>Ce texte doit comporter quelques détails mais pas trop</p>',
        ]);
        
    }
}