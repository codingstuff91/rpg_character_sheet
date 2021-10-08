<?php

namespace App\Models;

use App\Models\Caracteristique;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;

    public function caracteristiques()
    {
        return $this->hasMany(Caracteristique::class);
    }
}
