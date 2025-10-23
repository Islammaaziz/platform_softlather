<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Affiche la page d’inscription.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Traite la soumission du formulaire d’inscription.
     */
    public function store(Request $request): RedirectResponse
    {
        // ✅ Validation des champs
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // ✅ Création de l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Par défaut
        ]);

        event(new Registered($user));

       
        return redirect()->route('login')->with('success', 'Votre compte a été créé. Veuillez attendre l’activation par l’administrateur.');
    }
}
