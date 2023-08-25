<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acteur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'genre',
        'nationalite',
        'lieunais',
        'age',
        'contact',
        'address',
        'profession',
        'niveau',
    ];


    public function activites(){
        return $this->hasMany(Activite::class);
    }

    public function competences(){
        return $this->hasMany(Competence::class);
    }

    public function interets(){
        return $this->hasMany(Interet::class);
    }

    public function propositions(){
        return $this->hasMany(Interet::class);
    }
}
