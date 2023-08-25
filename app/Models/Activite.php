<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory;

    protected $fillable = [
        'secteur',
        'domaine',
        'libelle',
        'description',
        'contact',
        'address',
        'email',
    ];

    public function acteur(){
        return $this->belongsTo(Acteur::class);
    }


}
