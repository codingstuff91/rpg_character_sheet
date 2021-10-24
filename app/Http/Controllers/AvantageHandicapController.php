<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvantageHandicap;

class AvantageHandicapController extends Controller
{
    public function index(Request $request)
    {
        $avantages_handicaps = AvantageHandicap::where('personnage_id', $request->personnage_id)
                                ->get()
                                ->groupBy('type');

        return $avantages_handicaps;
    }
}
