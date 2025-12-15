<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rapport;
use App\Models\Contact;
class AdminController extends Controller
{
    public function dashboard()
    {
        // Récupère les 2 derniers utilisateurs actifs pour ton tableau existant
        $derniers_utilisateurs = User::where('statut', 'active')->latest()->take(2)->get();

        // Récupère les utilisateurs inactifs (en attente)
        $utilisateurs_inactifs = User::where('statut', 'inactive')->latest()->get();

           $tous_rapports = Rapport::latest()->get();

        return view('admin.dashboard', compact('derniers_utilisateurs', 'utilisateurs_inactifs', 'tous_rapports'));
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

   public function showutilisateur($id)
{
    // Récupère l'utilisateur par son ID
    $utilisateur = User::findOrFail($id);

    // Passe l'utilisateur à la vue
    return view('admin.showutilisateur', compact('utilisateur'));
}










public function modifierutilisateur($id)
{
    $utilisateur = User::findOrFail($id); // récupère l'utilisateur ou 404
    return view('admin.modifierutilisateur', compact('utilisateur'));
}


public function updateUtilisateur(Request $request, $id)
{
    $utilisateur = User::findOrFail($id);


    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $id,
        'prenom' => 'nullable|string|max:255',
        'ville' => 'nullable|string|max:255',
        'adresse' => 'nullable|string|max:500',
        'telephone' => 'nullable|string|max:20',
        'code_postal' => 'nullable|string|max:20',
        'password' => 'nullable|min:8',
    ]);

    $data = $request->only([
        'name', 'email', 'prenom', 'ville', 'adresse', 'telephone', 'code_postal'
    ]);

    // Chiffrer le mot de passe si fourni
    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    $utilisateur->update($data);

    return redirect()->route('voirutilisateurs')->with('success', 'Utilisateur mis à jour avec succès !');
}


public function deleteUtilisateur($id)
{
    $utilisateur = User::findOrFail($id);
    $utilisateur->delete();

    return redirect()->route('voirutilisateurs')
        ->with('success', 'Utilisateur supprimé avec succès !');
}

public function voirmessage()
{
     $messages = Contact::latest()->get();

    // Envoyer vers la vue
    return view('admin.boiteReception', compact('messages'));
}


public function marquerCommeLu($id)
{
    $msg = Contact::findOrFail($id);
    $msg->lu = true;
    $msg->save();

    return back()->with('success', 'Message marqué comme lu.');
}

public function marquerCommeNonLu($id)
{
    $msg = Contact::findOrFail($id);
    $msg->lu = false;
    $msg->save();

    return back()->with('success', 'Message marqué comme non lu.');
}
}
