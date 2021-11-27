<?php

namespace App\Http\Controllers;

use App\Models\Personnage;
use Illuminate\Http\Request;
use App\Services\UserRoleService;

class PersonnageController extends Controller
{
    public function index()
    {
        $characters = Personnage::with('user')->get();
        // dd($characters);
        
        return view('personnage.index')->with(['personnages' => $characters]);
    }

    public function show(Request $request)
    {
        $personnage = Personnage::find($request->character_id);

        return view('personnage.show')->with(['personnage' => $personnage]);
    }
}
