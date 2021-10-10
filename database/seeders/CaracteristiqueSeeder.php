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
    }
}
