<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personnage extends Model
{
    use HasFactory;

    // Un personnage est lié a un seul utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un personnage possede plusieurs caracteristiques
    public function caracteristiques()
    {
        return $this->hasMany(Caracteristiques::class);
    }
}
