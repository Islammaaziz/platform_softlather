<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\Rapport;

class UserController extends Controller
{
    // Fonction privée pour vérifier l'utilisateur normal
  private function checkUser()
{
    $user = Auth::user();

    if (!$user) {
        return redirect('/login')->with('error', 'Veuillez vous connecter !')->send();
    }

    if ($user->role !== 'user') {
        // Si c'est un admin, on le redirige vers son dashboard
        return redirect('/admin/dashboard')->with('error', 'Accès interdit à cette page')->send();
    }
}

    public function show()
    {
        $this->checkUser();

        $user = Auth::user(); 
        return view('platformAvecAcce.voirprofile', compact('user'));
    }

    public function edit()
    {
        $this->checkUser();

        $user = Auth::user(); 
        return view('platformAvecAcce.modifierprofil', compact('user'));
    }

    public function update(Request $request)
    {
        $this->checkUser();

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

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('voirprofil')->with('success', 'Profil mis à jour avec succès.');
    }

    public function dashboard()
    {
       if ($redirect = $this->checkUser()) {
        return $redirect; // <- très important
    }

        $user = Auth::user();

        $unreadNotifications = $user->unreadNotifications;
        $allNotifications = $user->notifications;

        return view('dashboard', compact('unreadNotifications', 'allNotifications'));
    }
}


