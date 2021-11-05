<?php

namespace App\Http\Controllers;

use App\Models\AllieContact;
use Illuminate\Http\Request;

class AllieContactController extends Controller
{
    /**
     * Recuperer tous les alliés et les contacts du personnage
     */
    public function index(Request $request)
    {
        $alliesContacts = AllieContact::where('personnage_id', $request->personnage_id)
                            ->get()
                            ->groupBy('type');

        return $alliesContacts;
    }
}
