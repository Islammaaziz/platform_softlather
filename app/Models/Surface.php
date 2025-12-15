<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surface extends Model
{
    use HasFactory;

    protected $fillable = [
        'donnees_techniques_id',
        'type',  
        'typeSpecifique',      
        'surface',
        'coef_c',
        'surface_active',
    ];

    public function donneesTechnique()
    {
        return $this->belongsTo(DonneesTechnique::class, 'donnees_techniques_id');
    }
}
