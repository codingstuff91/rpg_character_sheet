<?php

namespace App\Http\Controllers;

use App\Models\Personnage;
use Illuminate\Http\Request;
use App\Models\Caracteristique;
use Illuminate\Support\Facades\DB;

class CaracteristiqueController extends Controller
{
    public function get_levels(Request $request)
    {
        $caracteristiques = DB::table('caracteristiques')
        ->join('categories', 'caracteristiques.categorie_id', '=', 'categories.id')
        ->join('caracteristique_personnage', 'caracteristique_personnage.caracteristique_id', '=', 'caracteristiques.id')
        ->select('caracteristiques.id','caracteristiques.nom','caracteristique_personnage.niveau')
        ->where('personnage_id', $request->character_id)
        ->where('categories.nom', $request->characteristics_category_name)
        ->get();

        return $caracteristiques;
    }

    public function update(Request $request)
    {
        $caracteristique = DB::table('caracteristique_personnage')
        ->where('personnage_id', $request->character_id)
        ->where('caracteristique_id', $request->id_caracteristique)
        ->update(["niveau" => $request->new_value]);

        return "Niveau mis à jour";
    }
}
