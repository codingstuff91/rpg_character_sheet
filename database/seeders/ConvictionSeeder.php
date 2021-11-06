<?php

namespace Database\Seeders;

use App\Models\Conviction;
use Illuminate\Database\Seeder;

class ConvictionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Conviction::create([
            'personnage_id' => 1,
            'titre' => "<p>Ne te laisse jamais aller a la violence demesurée ou incontrolée</p>"
        ]);

        Conviction::create([
            'personnage_id' => 1,
            'titre' => "<p>Tu protégeras toujours les plus faibles</p>"
        ]);
    }
}