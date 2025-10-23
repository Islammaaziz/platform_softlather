<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authentification de base
        $request->authenticate();
        $request->session()->regenerate();
    
        $user = $request->user();
    
        // Vérifier si le compte est actif
        if ($user->statut !== 'active') {
            // Déconnecter immédiatement
            auth()->logout();
    
            return back()->withErrors([
                'email' => 'Votre compte n’est pas actif. Veuillez contacter SoftLather pour l’activer.',
            ])->onlyInput('email');
        }
    
        // Mettre à jour la date de dernière connexion
        $user->update(['last_login_at' => now()]);
    
        // Vérifier le rôle et rediriger
        if ($user->role === 'admin') {
            return redirect()->route('dashboardadmin');
        }
    
        // Utilisateur normal
        return redirect()->route('platformtechnique');
    }
    
    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
