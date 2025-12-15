<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonneesTechnique extends Model
{
    use HasFactory;

    protected $fillable = [
       'sitesurface',
        'debit_fuite',
        'zoneInput',
        'periodeAns',  
        'surface_active',
        'coefRuiss',
        'Hauteur_equivalente',
        'Hauteur_specifique_stockage',
        'volume',
    ];

    
    
    
    


    public function surfaces()
    {
        return $this->hasMany(Surface::class, 'donnees_techniques_id');
    }

    public function projet()
{
    return $this->belongsTo(Projet::class);
}

}
