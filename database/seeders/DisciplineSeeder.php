<?php

namespace Database\Seeders;

use App\Models\Discipline;
use Illuminate\Database\Seeder;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discipline::create([
            "nom" => "Animalisme",
            "niveau" => 1,
            "pouvoir" => "Lier un famulus",
            "description" => "Permet de lier au sang un animal",
            "cout" => "Un point de soif",
            "groupement_des" => "Aucun",
            "systeme" => "Aucun",
            "duree" => "Jusqu'a la mort du personnage"
        ]);
        
        Discipline::create([
            "nom" => "Animalisme",
            "niveau" => 1,
            "pouvoir" => "Murmures sauvages",
            "description" => "Permet de parler avec les animaux",
            "cout" => "Un test d'exaltation",
            "groupement_des" => "Manipulation + Animalisme ou Charisme + Animalisme",
            "systeme" => "Le dialogue ne necessite pas de jet",
            "duree" => "Une scène"
        ]);
        
        Discipline::create([
            "nom" => "Auspex",
            "niveau" => 1,
            "pouvoir" => "Sens accrus",
            "description" => "Permet de décupler un sens",
            "cout" => "Gratuit",
            "groupement_des" => "Astuce + résolution",
            "systeme" => "LLe joueur ajoute autant de des à ses jets de perception que son niveau d'auspex",
            "duree" => "Jusqu'a desactivation du pouvoir"
        ]);
    }
}
