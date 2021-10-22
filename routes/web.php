<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JaugeController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\PersonnageController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\CaracteristiqueController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('character')->group(function(){
    Route::get('/{character_id}', [PersonnageController::class, 'show']);
    Route::get('/{character_id}/{characteristics_category_name}/levels', [CaracteristiqueController::class, 'get_levels']);
    Route::get('/{personnage_id}/{nom_caracteristique}/jauge_level', [JaugeController::class, 'get_jauge_value']);
    Route::get('/{personnage_id}/disciplines', [DisciplineController::class, 'index']);
});

/** Route des Descriptions de caracteristiques */
Route::get('/description/edit', [DescriptionController::class, 'edit']);
Route::get('/description/{id}', [DescriptionController::class, 'show']);
Route::put('/description/{id}/edit', [DescriptionController::class, 'update']);