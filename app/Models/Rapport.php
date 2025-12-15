<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    protected $fillable = [
        'projet_id',
        'nom_fichier',
        'chemin_pdf',
          'user_id',
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
      public function user()
    {
        return $this->belongsTo(User::class);
    }
}
