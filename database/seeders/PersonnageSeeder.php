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
            'user_id' => User::where('name', 'Dimitri')->get()->first()->id,
            'nom' => 'Nosfé',
            'jeu' => 'Vampire la mascarade',
        ]);

        Personnage::create([
            'user_id' => User::where('name', 'Déborah')->get()->first()->id,
            'nom' => 'Malcolm',
            'jeu' => 'Vampire la mascarade',
        ]);

        Personnage::create([
            'user_id' => User::where('name', 'Mael')->get()->first()->id,
            'nom' => 'Deniel',
            'jeu' => 'Vampire la mascarade',
        ]);
        
        Personnage::create([
            'user_id' => User::where('name', 'Bellal')->get()->first()->id,
            'nom' => 'Mohammed',
            'jeu' => 'Vampire la mascarade',
        ]);
        
        Personnage::create([
            'user_id' => User::where('name', 'Martin')->get()->first()->id,
            'nom' => 'Ormus',
            'jeu' => 'Vampire la mascarade',
        ]);
    }
}
