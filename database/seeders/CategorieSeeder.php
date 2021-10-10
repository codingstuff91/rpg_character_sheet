<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorie::create([
            'nom' => 'Attributs_physiques',
        ]);

        Categorie::create([
            'nom' => 'Attributs_mentaux',
        ]);

        Categorie::create([
            'nom' => 'Attributs_sociaux',
        ]);
    }
}
