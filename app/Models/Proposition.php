<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposition extends Model
{
    use HasFactory;


    protected $fillable = [
        'libelle',
        'code_activation',
        'competence',
        'detail',
        'photos',
        'etat',
        'status',
    ];

    public function acteur(){
        return $this->belongsTo(Acteur::class);
    }
}
