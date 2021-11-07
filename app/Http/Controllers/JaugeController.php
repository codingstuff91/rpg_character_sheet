<?php

namespace App\Http\Controllers;

use App\Models\Jauge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JaugeController extends Controller
{
    public function get_jauge_value(Request $request)
    {                    
        $scores = DB::table('jauges')
        ->join('caracteristiques', 'jauges.caracteristique_id', '=', 'caracteristiques.id')
        ->where('personnage_id', $request->personnage_id)
        ->where('caracteristiques.nom', $request->nom_caracteristique)
        ->select('jauges.caracteristique_id','score', 'score_max')
        ->get();

        return $scores;
    }

    public function updage_jauge_value(Request $request)
    {
        $jauge = DB::table('jauges')
        ->where('personnage_id', $request->personnage_id)
        ->where('caracteristique_id', $request->id_caracteristique)
        ->update(['score' => $request->new_value]);
        
        return "Valeur jauge mise à jour";
    }
}
