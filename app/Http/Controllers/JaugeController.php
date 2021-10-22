<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JaugeController extends Controller
{
    public function get_jauge_value(Request $request)
    {
        $value = Jauge::where('personnage_id', $request->personnage_id)
                    ->where('caracteristique_id', $request->caracteristique)
                    ->select('score', 'score_max')
                    ->get();
    }
}
