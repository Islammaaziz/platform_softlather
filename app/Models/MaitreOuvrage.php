<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaitreOuvrage extends Model
{
    use HasFactory;

    protected $table = 'maitre_ouvrage'; // nom de la table correspondante

    protected $fillable = [
        'projet_id', // clé étrangère vers la table projets
        'nom',
        'prenom',
        'adresse',
        'cp',
        'ville',
        'telephone',
        'numero',
    ];

    // Relation inverse : un maître d'ouvrage appartient à un projet
    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
