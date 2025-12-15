<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
        public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'ligne' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:3000',
        ]);

        // Sauvegarde
        Contact::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'ligne' => $request->ligne,
            'message' => $request->message,
            'ip' => $request->ip()
        ]);

        return back()->with('success', 'Votre message a été envoyé avec succès !');
    }
}
