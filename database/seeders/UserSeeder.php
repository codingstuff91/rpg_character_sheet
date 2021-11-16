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
            'email' => 'dimitri.krajka@gmail.com',
            'role' => 'joueur',
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(20)
        ]);

        User::create([
            'name' => 'Déborah',
            'email' => 'Deborah.capaldi@hotmail.fr',
            'role' => 'joueur',
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(20)
        ]);

        User::create([
            'name' => 'Mael',
            'email' => 'mael@gmail.com',
            'role' => 'joueur',
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(20)
        ]);

        User::create([
            'name' => 'Bellal',
            'email' => 'bellal@gmail.com',
            'role' => 'joueur',
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(20)
        ]);

        User::create([
            'name' => 'Martin',
            'email' => 'martin@gmail.com',
            'role' => 'joueur',
            'password' => bcrypt('secret'),
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
