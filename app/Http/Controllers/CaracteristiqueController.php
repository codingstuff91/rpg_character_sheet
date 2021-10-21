<?php

namespace App\Http\Controllers;

use App\Models\Personnage;
use Illuminate\Http\Request;
use App\Models\Caracteristique;
use Illuminate\Support\Facades\DB;

class CaracteristiqueController extends Controller
{
    public function get_caracteristiques_levels(Request $request)
    {
        $caracteristiques = DB::table('caracteristiques')
        ->join('categories', 'caracteristiques.categorie_id', '=', 'categories.id')
        ->join('caracteristique_personnage', 'caracteristique_personnage.caracteristique_id', '=', 'caracteristiques.id')
        ->select('categories.nom','caracteristiques.nom','caracteristique_personnage.niveau')
        ->where('personnage_id', $request->personnage_id)
        ->where('categories.nom', $request->categorie)
        ->get();
    }
}
