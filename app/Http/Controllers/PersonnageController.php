<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonnageController extends Controller
{
    public function show()
    {
        return view('personnage.show');
    }
}
