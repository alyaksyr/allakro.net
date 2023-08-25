<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interet extends Model
{
    use HasFactory;

    protected $fillable = [
        'domaine',
        'libelle',
        'description',
    ];

    public function acteur(){
        return $this->belongsTo(Acteur::class);
    }
}
