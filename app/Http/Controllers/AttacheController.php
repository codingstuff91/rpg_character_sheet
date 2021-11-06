<?php

namespace App\Http\Controllers;

use App\Models\Attache;
use Illuminate\Http\Request;

class AttacheController extends Controller
{
    // Récuperer toutes les attaches du personnage
    public function index(Request $request)
    {
        $attaches = Attache::where('personnage_id', $request->personnage_id)->get();

        return $attaches;
    }
}
