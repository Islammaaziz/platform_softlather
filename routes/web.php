<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');


require __DIR__.'/auth.php';






Route::view('/mission', 'mission')->name('mission'); #route pour la premier page mission INFORMATIQUE

Route::view('/missiongtb', 'missiongtb')->name('missiongtb'); #route pour la DEUSIEME PAGE page mission GTB

Route::view('/contact', 'contact')->name('contact'); #route pour page Contact





Route::get('/dashboard', [UserController::class, 'dashboard'])->name('platformtechnique');


Route::get('/Rapport', [ProjetController::class, 'index'])->name('Rapport');

Route::get('/historique', [ProjetController::class, 'historique'])->name('historique');



Route::get('/profil/modifier', [UserController::class, 'edit'])->name('modifierprofil');

Route::view('/calcul', 'platformAvecAcce.calcul')->name('calcul');









Route::view('/voirRapports', 'admin.voirRapports')->name('voirRapports');

Route::get('/voirRapports', [UserController::class, 'voirRapports'])->name('voirRapports');



Route::get('/admin/utilisateur/{id}/edit', [AdminController::class, 'modifierutilisateur'])
    ->name('modifierutilisateur');

    Route::put('/admin/utilisateur/{id}', [AdminController::class, 'updateUtilisateur'])
    ->name('updateutilisateur');




Route::get('/profil', [UserController::class, 'show'])->name('voirprofil');

Route::put('/profil', [UserController::class, 'update'])->name('profil.update');


Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboardadmin');


Route::get('/admin/showutilisateur/{id}', [AdminController::class, 'showutilisateur'])->name('showutilisateur');


Route::get('/admin/voirutilisateurs', [AdminController::class, 'voirutilisateur'])->name('voirutilisateurs');

Route::post('/admin/user/{user}/confirm', [AdminController::class, 'confirmUser'])->name('admin.user.confirm');
Route::delete('/admin/user/{user}/refuse', [AdminController::class, 'refuseUser'])->name('admin.user.refuse');




Route::put('/message/{id}/lu', [AdminController::class, 'marquerCommeLu'])->name('message.lu');
Route::put('/message/{id}/nolu', [AdminController::class, 'marquerCommeNonLu'])->name('message.nolu');


Route::get('/voirmessage', [AdminController::class, 'voirmessage'])->name('voirmessage');




Route::post('/projets', [ProjetController::class, 'store'])->name('projets.store');


Route::post('/donnees/store', [ProjetController::class, 'storeS'])->name('donnees.store');




Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


Route::delete('/admin/utilisateur/{id}', [AdminController::class, 'deleteUtilisateur'])
    ->name('deleteutilisateur');



