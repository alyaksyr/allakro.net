<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;

    protected $fillable = [
        'secteur',
        'domaine',
        'libelle',
        'description',
        'photo',
        'status',
    ];

    public function acteur(){
        return $this->belongsTo(Acteur::class);
    }
}
