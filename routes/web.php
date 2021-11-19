<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JaugeController;
use App\Http\Controllers\AttacheController;
use App\Http\Controllers\ConvictionController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\PersonnageController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\AllieContactController;
use App\Http\Controllers\CaracteristiqueController;
use App\Http\Controllers\AvantageHandicapController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('character')->middleware('auth')->group(function(){
    Route::get('/all', [PersonnageController::class, 'index']);
    Route::get('/{character_id}', [PersonnageController::class, 'show'])->middleware('check_character_owner');
    Route::get('/{character_id}/{characteristics_category_name}/levels', [CaracteristiqueController::class, 'get_levels']);
    Route::post('/{character_id}/{id_caracteristique}/update', [CaracteristiqueController::class, 'update']);
    Route::get('/{personnage_id}/{nom_caracteristique}/jauge_level', [JaugeController::class, 'get_jauge_value']);
    Route::post('/{personnage_id}/{id_caracteristique}/update_jauge_level', [JaugeController::class, 'updage_jauge_value']);
    Route::get('/{personnage_id}/disciplines', [DisciplineController::class, 'index']);
    Route::get('/{personnage_id}/avantages_handicaps', [AvantageHandicapController::class, 'index']);
    Route::get('/{personnage_id}/allies_contacts', [AllieContactController::class, 'index']);
    Route::get('/{personnage_id}/attaches', [AttacheController::class, 'index']);
    Route::get('/{personnage_id}/convictions', [ConvictionController::class, 'index']);
});

/** Route des Descriptions de caracteristiques */
route::prefix('description')->middleware('auth')->group(function(){
    Route::get('/edit', [DescriptionController::class, 'edit']);
    Route::get('/{id}', [DescriptionController::class, 'show']);
    Route::put('/{id}/edit', [DescriptionController::class, 'update']);
});

Route::resource('discipline', DisciplineController::class);