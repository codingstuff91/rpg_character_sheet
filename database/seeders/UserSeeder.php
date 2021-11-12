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
            'role' => 'joueur',
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(20)
        ]);

        User::create([
            'name' => 'deborah',
            'email' => 'deborah@gmail.com',
            'role' => 'joueur',
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(20)
        ]);

        User::create([
            'name' => 'mael',
            'email' => 'mael@gmail.com',
            'role' => 'joueur',
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(20)
        ]);

        User::create([
            'name' => 'bellal',
            'email' => 'bellal@gmail.com',
            'role' => 'joueur',
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(20)
        ]);
    }
}
