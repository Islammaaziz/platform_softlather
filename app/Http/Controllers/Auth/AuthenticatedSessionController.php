<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
use App\Mail\TestMail;
use App\Notifications\ConnexionNotification;

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
        // 🔹 Déconnexion complète de tout utilisateur précédent
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Cookie::queue(Cookie::forget(Auth::getRecallerName())); // supprime remember me

        // 🔹 Authentification
        $request->authenticate();
        $request->session()->regenerate(); // nouvelle session propre

        $user = $request->user();

        // 🔹 Vérifier si le compte est actif
        if ($user->statut !== 'active') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Cookie::queue(Cookie::forget(Auth::getRecallerName()));

            return back()->withErrors([
                'email' => 'Votre compte n’est pas actif. Veuillez contacter SoftLather pour l’activer.',
            ])->onlyInput('email');
        }

        // 🔹 Mettre à jour la dernière connexion
        $user->update(['last_login_at' => now()]);

        // 🔹 Envoyer mail et notification
        Mail::to($user->email)->send(new TestMail());
        $user->notify(new ConnexionNotification($user));

        // 🔹 Redirection selon rôle
        return $user->role === 'admin' 
            ? redirect()->route('dashboardadmin') 
            : redirect()->route('platformtechnique');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Cookie::queue(Cookie::forget(Auth::getRecallerName())); // supprime remember me

        return redirect('/login');
    }

    /**
     * Optional: action après authentification réussie
     */
    protected function authenticated($request, $user)
    {
        $user->notify(new ConnexionNotification($user));
    }
}
