<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaitreOeuvre extends Model
{
    use HasFactory;

    
    protected $table = 'maitre_oeuvre';

    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'cp',
        'ville',
        'telephone',
        'numero',
        'projet_id',
    ];

    // Relation inverse vers Projet
    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
