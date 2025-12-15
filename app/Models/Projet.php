<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_projet',
        'ref_interne',
        'adresse',
        'cp',
        'ville',
    ];

public function donneesTechniques()
{
    return $this->hasOne(DonneesTechnique::class);
}

public function maitreOuvrage()
{
    return $this->hasOne(MaitreOuvrage::class);
}

public function maitreOeuvre()
{
    return $this->hasOne(MaitreOeuvre::class);
}

public function surfaces()
{
    return $this->hasMany(Surface::class);
}

public function donneesTechnique()
{
    return $this->hasOne(DonneesTechnique::class);
}

public function rapport()
{
    return $this->hasOne(Rapport::class);
}




}
