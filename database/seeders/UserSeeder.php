<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
        User::create([
            'name' => 'Dimitri',
            'email' => 'dimitrikrajka@hotmail.fr',
            'role' => 'joueur',
            'password' => bcrypt('krajka_secret'),
            'remember_token' => Str::random(20)
        ]);

        User::create([
            'name' => 'Déborah',
            'email' => 'Deborah.capaldi@hotmail.fr',
            'role' => 'joueur',
            'password' => bcrypt('capaldi_secret'),
            'remember_token' => Str::random(20)
        ]);

        User::create([
            'name' => 'Mael',
            'email' => 'dauphinmael@gmail.com',
            'role' => 'joueur',
            'password' => bcrypt('dauphin_secret'),
            'remember_token' => Str::random(20)
        ]);

        User::create([
            'name' => 'Bellal',
            'email' => 'bellal.waissi@gmail.com',
            'role' => 'joueur',
            'password' => bcrypt('waissi_secret'),
            'remember_token' => Str::random(20)
        ]);

        User::create([
            'name' => 'Martin',
            'email' => 'm_truffier@hotmail.fr',
            'role' => 'joueur',
            'password' => bcrypt('truffier_secret'),
            'remember_token' => Str::random(20)
        ]);

        User::create([
            'name' => 'Matthieu',
            'email' => 'matthieu.martin2812@gmail.com',
            'role' => 'mj',
            'password' => bcrypt('Fnp90std@'),
            'remember_token' => Str::random(20)
        ]);
    }
}
