<?php

namespace App\Http\Controllers;

use App\Models\Personnage;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    public function index(Request $request)
    {
        $personnage = Personnage::find($request->personnage_id);

        return $personnage->disciplines()->get()->groupBy('nom');
    }
}
