<?php

namespace App\Models;

use App\Models\Personnage;
use App\Models\Caracteristique;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jauge extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function caracteristique()
    {
        return $this->belongsTo(Caracteristique::class);
    }

    public function personnage()
    {
        return $this->hasOne(Personnage::class);
    }
}
