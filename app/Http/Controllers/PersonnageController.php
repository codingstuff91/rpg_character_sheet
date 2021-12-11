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

        $other_characters = $characters->filter(function ($value) {
            return $value['id'] != auth()->user()->id;
        });
        
        $user_character = $characters->filter(function ($value) {
            return $value['id'] == auth()->user()->id;
        });
      
        return view('personnage.index')->with([
            'personnages' => $other_characters->all(),
            'personnage_joueur' => $user_character->all()
        ]);
    }

    public function show(Request $request)
    {
        $personnage = Personnage::find($request->character_id);

        return view('personnage.show')->with(['personnage' => $personnage]);
    }
}
