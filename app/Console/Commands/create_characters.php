<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class create_characters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'characters:create {perso_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new characters';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $characters = DB::table('caracteristique_personnage')
        ->where('personnage_id', 1)
        ->get();

        foreach ($characters as $character) {
            DB::table('caracteristique_personnage')->insert([
                'personnage_id' => $this->argument('perso_id'),
                'caracteristique_id' => $character->caracteristique_id,
                'niveau' => $character->niveau
            ]);
        }
    }
}
