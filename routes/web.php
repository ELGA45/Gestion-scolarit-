<?php

use App\Http\Controllers\FiliereController;
use App\Http\Controllers\NiveauController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('filieres', FiliereController::class);

Route::resource('niveaux', NiveauController::class);
Route::post('niveaux/{niveau}/sous-niveaux', [NiveauController::class, 'storeSousNiveau'])
    ->name('niveaux.sousNiveaux.store');

Route::put('sous-niveaux/{sousNiveau}', [NiveauController::class, 'updateSousNiveau'])
    ->name('sousNiveaux.update');

Route::delete('sous-niveaux/{sousNiveau}', [NiveauController::class, 'destroySousNiveau'])
    ->name('sousNiveaux.destroy');

Route::get('niveaux/{niveau}/sous-niveaux/create', [NiveauController::class, 'createSousNiveau'])
    ->name('niveaux.sousNiveaux.create');

Route::get('sous-niveaux/{sousNiveau}/edit',[NiveauController::class, 'editSousNiveau'])
    ->name('sousNiveaux.edit');
