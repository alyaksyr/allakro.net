<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epidemie extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'type',
        'cause',
        'foyer',
        'symptomes',
        'nombre_cas',
        'duree',
        'datedebut',
        'datefin',
        'etat',
    ];
}
