<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


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



Route::get('/profil/modifier', [UserController::class, 'edit'])->name('modifierprofil');

Route::view('/calcul', 'platformAvecAcce.calcul')->name('calcul');









Route::view('/voirRapports', 'admin.voirRapports')->name('voirRapports');

Route::view('/showutilisateur', 'admin.showutilisateur')->name('showutilisateur');

Route::view('/modifierutilisateur', 'admin.modifierutilisateur')->name('modifierutilisateur');





Route::get('/profil', [UserController::class, 'show'])->name('voirprofil');

Route::put('/profil', [UserController::class, 'update'])->name('profil.update');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboardadmin');

Route::get('/admin/voirutilisateurs', [AdminController::class, 'voirutilisateur'])->name('voirutilisateurs');

Route::post('/admin/user/{user}/confirm', [AdminController::class, 'confirmUser'])->name('admin.user.confirm');
Route::delete('/admin/user/{user}/refuse', [AdminController::class, 'refuseUser'])->name('admin.user.refuse');