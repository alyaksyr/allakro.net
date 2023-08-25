<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_id',
        'libelle',
        'description',
        'photo',
        'status',
    ];


    public function acteur(){
        return $this->belongsTo(Acteur::class);
    }

    public function donnees(){
        return $this->hasMany(MetaAnnonce::class);
    }
}
