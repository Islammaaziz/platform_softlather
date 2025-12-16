<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| ROUTES PUBLIQUES (OK)
|--------------------------------------------------------------------------
*/

Route::view('/mission', 'mission')->name('mission');
Route::view('/missiongtb', 'missiongtb')->name('missiongtb');
Route::view('/contact', 'contact')->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| ROUTES AUTH PAR DÉFAUT (Laravel)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| ROUTES PROTÉGÉES (UTILISATEUR CONNECTÉ)
|--------------------------------------------------------------------------
*/

// dashboard (version contrôleur)
Route::get('/dashboard', [UserController::class, 'dashboard'])
    ->middleware(['auth'])
    ->name('platformtechnique');

// profil (Laravel Breeze)
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profil', [UserController::class, 'show'])->name('voirprofil');
    Route::put('/profil', [UserController::class, 'update'])->name('profil.update');

    Route::get('/profil/modifier', [UserController::class, 'edit'])->name('modifierprofil');

    Route::get('/historique', [ProjetController::class, 'historique'])->name('historique');
    Route::get('/Rapport', [ProjetController::class, 'index'])->name('Rapport');

    Route::view('/calcul', 'platformAvecAcce.calcul')->name('calcul');

    Route::post('/projets', [ProjetController::class, 'store'])->name('projets.store');
    Route::post('/donnees/store', [ProjetController::class, 'storeS'])->name('donnees.store');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

/*
|--------------------------------------------------------------------------
| ROUTES ADMIN (SENSIBLES)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('dashboardadmin');

    Route::get('/admin/utilisateur/{id}/edit', [AdminController::class, 'modifierutilisateur'])
        ->name('modifierutilisateur');

    Route::put('/admin/utilisateur/{id}', [AdminController::class, 'updateUtilisateur'])
        ->name('updateutilisateur');

    Route::delete('/admin/utilisateur/{id}', [AdminController::class, 'deleteUtilisateur'])
        ->name('deleteutilisateur');

    Route::get('/admin/showutilisateur/{id}', [AdminController::class, 'showutilisateur'])
        ->name('showutilisateur');

    Route::get('/admin/voirutilisateurs', [AdminController::class, 'voirutilisateur'])
        ->name('voirutilisateurs');

    Route::post('/admin/user/{user}/confirm', [AdminController::class, 'confirmUser'])
        ->name('admin.user.confirm');

    Route::delete('/admin/user/{user}/refuse', [AdminController::class, 'refuseUser'])
        ->name('admin.user.refuse');

    Route::put('/message/{id}/lu', [AdminController::class, 'marquerCommeLu'])
        ->name('message.lu');

    Route::put('/message/{id}/nolu', [AdminController::class, 'marquerCommeNonLu'])
        ->name('message.nolu');

    Route::get('/voirmessage', [AdminController::class, 'voirmessage'])
        ->name('voirmessage');

    Route::get('/voirRapports', [AdminController::class, 'voirRapports'])
        ->name('voirRapports');
});
