<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    public function dashboard()
    {
        // Récupère les 2 derniers utilisateurs actifs pour ton tableau existant
        $derniers_utilisateurs = User::where('statut', 'active')->latest()->take(2)->get();

        // Récupère les utilisateurs inactifs (en attente)
        $utilisateurs_inactifs = User::where('statut', 'inactive')->latest()->get();

        return view('admin.dashboard', compact('derniers_utilisateurs', 'utilisateurs_inactifs'));
    }

    public function voirutilisateur()
    {
        // Récupère tous les utilisateurs
        $utilisateurs = User::latest()->get(); // latest() pour trier par date de création décroissante

        return view('admin.voirutilisateurs', compact('utilisateurs'));
    }

    public function confirmUser(User $user)
    {
        $user->update(['statut' => 'active']);
        return redirect()->back()->with('success', "L'utilisateur {$user->name} a été activé.");
    }

    public function refuseUser(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', "L'utilisateur {$user->name} a été supprimé.");
    }
}
