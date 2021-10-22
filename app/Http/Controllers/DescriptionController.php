<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caracteristique;

class DescriptionController extends Controller
{
    public function edit(Request $request)
    {
        $caracteristiques = Caracteristique::all();

        return view('description.edit')->with(['caracteristiques' => $caracteristiques]);
    }

    public function show(Request $request)
    {
        $description = Caracteristique::find($request->id)->description;

        return $description;
    }

    public function update(Request $request)
    {
        $caracteristique = Caracteristique::find($request->id);
        $caracteristique->description = $request->description;

        $caracteristique->save();

        return "Description mise à jour";
    }
}
