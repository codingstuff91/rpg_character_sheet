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
            'discipline.nom' => 'required',
            'discipline.niveau' => 'required',
            'discipline.pouvoir' => 'required',
            'discipline.description' => 'required',
            'discipline.cout' => 'required',
            'discipline.groupement_des' => 'required',
            'discipline.systeme' => 'required',
            'discipline.duree' => 'required',
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
