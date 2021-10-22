<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisciplinePersonnageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discipline_personnage')->insert([
            "personnage_id" => 1,
            "discipline_id" => 1,
        ]);

        DB::table('discipline_personnage')->insert([
            "personnage_id" => 1,
            "discipline_id" => 2,
        ]);

        DB::table('discipline_personnage')->insert([
            "personnage_id" => 1,
            "discipline_id" => 3,
        ]);
    }
}
