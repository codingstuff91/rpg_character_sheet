<?php

namespace Database\Seeders;

use App\Models\Attache;
use Illuminate\Database\Seeder;

class AttacheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attache::create([
            'personnage_id' => 1,
            'nom' => 'Monica',
            'details' => "<p>La conjointe du personnage qu'il continue de voir et sur qui il se nourrit de temps à autres</p>"
        ]);

        Attache::create([
            'personnage_id' => 1,
            'nom' => 'Johnny',
            'details' => "<p>Son fils de 6 ans qu'il continue de voir malgré sa nouvelle condition</p>"
        ]);
    }
}