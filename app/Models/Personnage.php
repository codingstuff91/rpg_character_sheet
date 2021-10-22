<?php

namespace App\Models;

use App\Models\User;
use App\Models\Discipline;
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

    // Un personnage possede plusieurs disciplines
    public function disciplines()
    {
        return $this->belongsToMany(Discipline::class);
    }
}
