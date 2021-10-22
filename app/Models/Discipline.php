<?php

namespace App\Models;

use App\Models\Personnage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discipline extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function personnage()
    {
        return $this->belongsToMany(Personnage::class);
    }
}
