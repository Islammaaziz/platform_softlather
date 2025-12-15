<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\Rapport;

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

    +
     $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'prenom' => 'nullable|string|max:255',
        'email' => 'required|email|max:255',
        'telephone' => 'nullable|string|max:20',
        'adresse' => 'nullable|string|max:255',
        'ville' => 'nullable|string|max:255',
        'code_postal' => 'nullable|string|max:20',
        'password' => 'nullable|min:8',
    ]);

    $data = $request->only([
        'name',
        'prenom',
        'email',
        'telephone',
        'adresse',
        'ville',
        'code_postal',
    ]);

    // 👉 NE CHANGE LE PASSWORD QUE SI IL EST RENSEIGNÉ
    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    $user->update($data);

    return redirect()->route('voirprofil')->with('success', 'Profil mis à jour avec succès.');
}

public function dashboard(){

   $user = Auth::user();

        // Notifications non lues
        $unreadNotifications = $user->unreadNotifications;

        // Toutes les notifications (lues + non lues)
        $allNotifications = $user->notifications;

        return view('dashboard', compact('unreadNotifications', 'allNotifications'));


}

public function voirRapports(){


      $rapports = Rapport::latest()->get();

    return view('admin.voirRapports', compact('rapports'));
}


}
