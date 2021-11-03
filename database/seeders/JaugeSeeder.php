<?php

namespace Database\Seeders;

use App\Models\Caracteristique;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JaugeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jauges')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Dégats Contondants')->get()->first()->id,
            "score" => 2,
            "score_max" => 6
        ]);

        DB::table('jauges')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Dégats Aggravés')->get()->first()->id,
            "score" => 0,
            "score_max" => 6
        ]);

        DB::table('jauges')->insert([
            "personnage_id" => 1,
            "caracteristique_id" => Caracteristique::where('nom', 'Volonté')->get()->first()->id,
            "score" => 7,
            "score_max" => 7
        ]);
    }
}
