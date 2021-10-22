<?php

namespace App\Models;

use App\Models\Jauge;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Caracteristique extends Model
{
    use HasFactory;

    // Chaque caracteristique est lié à une jauge variable
    public function jauge()
    {
        return $this->hasOne(Jauge::class);
    }

    // Chaque caracteristique est lié à une categorie
    public function categorie()
    {
        return $this->hasOne(Categorie::class);
    }
}
