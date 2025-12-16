<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rapport;
use App\Models\Contact;

class AdminController extends Controller
{
    // Vérifie si l'utilisateur est admin
    private function checkAdmin()
    {
        $user = auth()->user();
        if (!$user || $user->role !== 'admin') {
            return redirect('/dashboard')->with('error', 'Accès interdit !')->send();
        }
    }

    public function dashboard()
    {
        $this->checkAdmin();

        $derniers_utilisateurs = User::where('statut', 'active')->latest()->take(2)->get();
        $utilisateurs_inactifs = User::where('statut', 'inactive')->latest()->get();
        $tous_rapports = Rapport::latest()->get();

        return view('admin.dashboard', compact('derniers_utilisateurs', 'utilisateurs_inactifs', 'tous_rapports'));
    }

    public function voirutilisateur()
    {
        $this->checkAdmin();

        $utilisateurs = User::latest()->get();
        return view('admin.voirutilisateurs', compact('utilisateurs'));
    }

    public function confirmUser(User $user)
    {
        $this->checkAdmin();

        $user->update(['statut' => 'active']);
        return redirect()->back()->with('success', "L'utilisateur {$user->name} a été activé.");
    }

    public function refuseUser(User $user)
    {
        $this->checkAdmin();

        $user->delete();
        return redirect()->back()->with('success', "L'utilisateur {$user->name} a été supprimé.");
    }

    public function showutilisateur($id)
    {
        $this->checkAdmin();

        $utilisateur = User::findOrFail($id);
        return view('admin.showutilisateur', compact('utilisateur'));
    }

    public function modifierutilisateur($id)
    {
        $this->checkAdmin();

        $utilisateur = User::findOrFail($id);
        return view('admin.modifierutilisateur', compact('utilisateur'));
    }

    public function updateUtilisateur(Request $request, $id)
    {
        $this->checkAdmin();

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

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $utilisateur->update($data);

        return redirect()->route('voirutilisateurs')->with('success', 'Utilisateur mis à jour avec succès !');
    }

    public function deleteUtilisateur($id)
    {
        $this->checkAdmin();

        $utilisateur = User::findOrFail($id);
        $utilisateur->delete();

        return redirect()->route('voirutilisateurs')
            ->with('success', 'Utilisateur supprimé avec succès !');
    }

    public function voirmessage()
    {
        $this->checkAdmin();

        $messages = Contact::latest()->get();
        return view('admin.boiteReception', compact('messages'));
    }

    public function marquerCommeLu($id)
    {
        $this->checkAdmin();

        $msg = Contact::findOrFail($id);
        $msg->lu = true;
        $msg->save();

        return back()->with('success', 'Message marqué comme lu.');
    }

    public function marquerCommeNonLu($id)
    {
        $this->checkAdmin();

        $msg = Contact::findOrFail($id);
        $msg->lu = false;
        $msg->save();

        return back()->with('success', 'Message marqué comme non lu.');
    }

    
 public function voirRapports()
{
    $user = auth()->user();

    // Vérifie si l'utilisateur est connecté et admin
    if (!$user || $user->role !== 'admin') {
        return redirect('/login')->with('error', 'Accès interdit !');
    }

    $rapports = Rapport::latest()->get();

    return view('admin.voirRapports', compact('rapports'));
}


}
