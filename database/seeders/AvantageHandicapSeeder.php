<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AvantageHandicap;

class AvantageHandicapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AvantageHandicap::create([
            'personnage_id' => 1,
            'type' => 'avantage',
            'nom' => 'Voix enchanteresse',
            'description' => 'Votre voix est plus mélodieuse et agréable vous donnant plus de charisme',
            'niveau' => 0
        ]);

        AvantageHandicap::create([
            'personnage_id' => 1,
            'type' => 'handicap',
            'nom' => 'Apparence hideuse',
            'description' => 'Vous etes moche à en faire peur',
            'niveau' => 1
        ]);
    }
}
