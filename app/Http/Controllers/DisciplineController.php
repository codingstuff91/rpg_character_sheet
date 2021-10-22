<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    public function index(Request $request)
    {
        $disciplines = Discipline::where('personnage_id', $request->personnage_id)->get();

        return $disciplines;
    }
}
