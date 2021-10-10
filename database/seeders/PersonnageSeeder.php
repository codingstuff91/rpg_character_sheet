<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Personnage;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PersonnageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Personnage::create([
            'user_id' => User::where('name', 'dimitri')->get()->first()->id,
            'nom' => 'Nosfé',
            'jeu' => 'Vampire la mascarade',
        ]);

        Personnage::create([
            'user_id' => User::where('name', 'deborah')->get()->first()->id,
            'nom' => 'Malcolm',
            'jeu' => 'Vampire la mascarade',
        ]);

        Personnage::create([
            'user_id' => User::where('name', 'mael')->get()->first()->id,
            'nom' => 'Deniel',
            'jeu' => 'Vampire la mascarade',
        ]);
        
        Personnage::create([
            'user_id' => User::where('name', 'bellal')->get()->first()->id,
            'nom' => 'Mohammed',
            'jeu' => 'Vampire la mascarade',
        ]);
    }
}
