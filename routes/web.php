<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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




Route::view('/dashboard', 'dashboard')->name('platformtechnique');

Route::view('/Rapport', 'platformAvecAcce.Rapport')->name('Rapport');

Route::view('/voirprofil', 'platformAvecAcce.voirprofil')->name('voirprofil');

Route::view('/modifierprofil', 'platformAvecAcce.modifierprofil')->name('modifierprofil');

Route::view('/calcul', 'platformAvecAcce.calcul')->name('calcul');





Route::view('/dashboardadmin', 'admin.dashboard')->name('dashboardadmin');

Route::view('/voirutilisateurs', 'admin.voirutilisateurs')->name('voirutilisateurs');

Route::view('/voirRapports', 'admin.voirRapports')->name('voirRapports');

Route::view('/showutilisateur', 'admin.showutilisateur')->name('showutilisateur');

Route::view('/modifierutilisateur', 'admin.modifierutilisateur')->name('modifierutilisateur');



