<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Competence extends Model
{
    use HasFactory;

    protected $fillable = [
        'secteur',
        'libelle',
        'description',
        'photo',
        'status',
        'acteur_id',
    ];

    public function acteur(){
        return $this->belongsTo(Acteur::class);
    }

    /** affichage dans le html {{$competence->urlPhoto()}} */
    public function urlPhoto(): string {
        return Storage::url($this->photo);
        
    }

}
