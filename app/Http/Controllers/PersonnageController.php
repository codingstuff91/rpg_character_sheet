<?php

namespace App\Http\Controllers;

use App\Models\Personnage;
use Illuminate\Http\Request;

class PersonnageController extends Controller
{
    public function show(Request $request)
    {
        $personnage = Personnage::find($request->character_id);

        return view('personnage.show')->with(['personnage' => $personnage]);
    }
}
