<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Caracteristique;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Experience')->get()->first()->id,
            'nom' => 'Experience',
            'description' => 'Le nombre de points d\'experience gagnés par votre personnage, qui peuvent être utilisés pour améliorer votre personnage',
        ]);

        DB::table('caracteristique_personnage')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Experience')->get()->first()->id,
            "niveau" => 12
        ]);
    }
}
