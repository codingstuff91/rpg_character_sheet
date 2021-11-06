<?php

namespace App\Http\Controllers;

use App\Models\Conviction;
use Illuminate\Http\Request;

class ConvictionController extends Controller
{
    // Récuperer toutes les convictions du personnage
    public function index(Request $request)
    {
        $convictions = Conviction::where('personnage_id', $request->personnage_id)->get();

        return $convictions;
    }
}
