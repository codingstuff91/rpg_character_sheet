<?php

namespace App\Http\Controllers;

use App\Models\Personnage;
use Illuminate\Http\Request;
use App\Services\UserRoleService;

class PersonnageController extends Controller
{
    public function index(UserRoleService $role)
    {
        $user_id = auth()->user()->id;

        $characters = Personnage::where('user_id', $user_id)->get();

        if($role->is_admin())
        {
            $characters = Personnage::all();
        }else{
            $characters = auth()->user()->personnages;
        }
        
        return view('personnage.index')->with(['personnages' => $characters]);
    }

    public function show(Request $request)
    {
        $personnage = Personnage::find($request->character_id);

        return view('personnage.show')->with(['personnage' => $personnage]);
    }
}
