<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvantageHandicap extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "avantages_handicaps";
}
