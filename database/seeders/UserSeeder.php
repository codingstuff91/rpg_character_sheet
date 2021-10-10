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
            'name' => 'dimitri',
            'email' => 'dimitri.krajka@gmail.com',
            'pseudo' => 'didou',
            'role' => 'joueur',
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(20)
        ]);

        User::create([
            'name' => 'deborah',
            'email' => 'deborah@gmail.com',
            'pseudo' => 'lylysu',
            'role' => 'joueur',
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(20)
        ]);

        User::create([
            'name' => 'mael',
            'email' => 'mael@gmail.com',
            'pseudo' => 'mael',
            'role' => 'joueur',
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(20)
        ]);

        User::create([
            'name' => 'bellal',
            'email' => 'bellal@gmail.com',
            'pseudo' => 'bellal',
            'role' => 'joueur',
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(20)
        ]);
    }
}
