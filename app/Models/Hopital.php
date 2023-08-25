<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hopital extends Model
{
    use HasFactory;

    protected $fillable= [
        'nom',
        'type',
        'contact',
        'address',
    ];

    public function bons(){
        return $this->belongsToMany(Bon::class);
    }

    public function offres(){
        return $this->belongsToMany(Offre::class);
    }
}
