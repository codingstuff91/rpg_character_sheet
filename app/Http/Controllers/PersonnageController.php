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
    
    /**
     * Générer un lancer de dés 10
     * 
     * @param Integer $nombre_des Le nombre de dés classiques à lancer
     * @param Integer $nombre_des_soif le nombre de dés de soif à lancer
     * 
     * @return Array
     */
    public function lancer_des(Request $request)
    {
        // return $request->all();
        $resultats_lancer_des = [];
        $resultats_lancer_des_soif = [];

        if($request->nombre_des_soif != 0)
        {
            for ($i=0; $i < $request->nombre_des_soif ; $i++) { 
                $resultat_des_soif = rand(1,10);
                $resultats_lancer_des_soif[] = $resultat_des_soif;
            }
        }

        for ($j=0; $j < $request->nombre_des - $request->nombre_des_soif ; $j++) { 
            $resultat_des = rand(1,10);
            $resultats_lancer_des[] = $resultat_des;
        }

        return [$resultats_lancer_des_soif, $resultats_lancer_des];
    }
}
