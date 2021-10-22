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
            'nom' => 'Infos_générales',
        ]);

        Categorie::create([
            'nom' => 'Attributs_physiques',
        ]);

        Categorie::create([
            'nom' => 'Attributs_mentaux',
        ]);

        Categorie::create([
            'nom' => 'Attributs_sociaux',
        ]);

        Categorie::create([
            'nom' => 'Capacités_talents',
        ]);

        Categorie::create([
            'nom' => 'Capacités_compétences',
        ]);

        Categorie::create([
            'nom' => 'Capacités_connaissances',
        ]);

        Categorie::create([
            'nom' => 'Avantages_disciplines',
        ]);

        Categorie::create([
            'nom' => 'Avantages_historiques',
        ]);

        Categorie::create([
            'nom' => 'Avantages_vertus',
        ]);

        Categorie::create([
            'nom' => 'Atouts',
        ]);

        Categorie::create([
            'nom' => 'Handicaps',
        ]);

        Categorie::create([
            'nom' => 'Humanité',
        ]);

        Categorie::create([
            'nom' => 'Jauges',
        ]);

        Categorie::create([
            'nom' => 'Experience',
        ]);
    }
}
