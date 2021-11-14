<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\Personnage;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    public function index(Request $request)
    {
        $personnage = Personnage::find($request->personnage_id);

        return $personnage->disciplines()->get()->groupBy('nom');
    }

    public function create()
    {
        return view('discipline.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'niveau' => 'required',
            'pouvoir' => 'required',
            'description' => 'required',
            'cout' => 'required',
            'groupement_des' => 'required',
            'systeme' => 'required',
            'duree' => 'required',
        ]);
        
        Discipline::create([
            "nom" => $request->discipline['nom'],
            "niveau" => $request->discipline['niveau'],
            "pouvoir" => $request->discipline['pouvoir'],
            "description" => $request->discipline['description'],
            "cout" => $request->discipline['cout'],
            "groupement_des" => $request->discipline['groupement_des'],
            "systeme" => $request->discipline['systeme'],
            "duree" => $request->discipline['duree']
        ]);
    }
}
