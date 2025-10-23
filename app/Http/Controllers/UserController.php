<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
class UserController extends Controller
{
    public function show()
    {
        $user = Auth::user(); // récupère l'utilisateur connecté

        if (!$user) {
            return "Aucun utilisateur connecté."; // simple gestion d'erreur
        }

        return view('platformAvecAcce.voirprofile', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user(); // utilisateur connecté
        return view('platformAvecAcce.modifierprofil', compact('user'));
    }


    public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'prenom' => 'nullable|string|max:255',
        'email' => 'required|email|max:255',
        'telephone' => 'nullable|string|max:20',
        'password' => 'nullable|min:8',
    ]);

    $data = $request->only(['name', 'prenom', 'email', 'telephone']);

    // Si le mot de passe est saisi, on le chiffre
    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    $user->update($data);

    return redirect()->route('voirprofil')->with('success', 'Profil mis à jour avec succès.');
}


}
