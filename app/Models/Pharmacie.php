<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacie extends Model
{
    use HasFactory;

    protected $fillable= [
        'nom',
        'responsable',
        'contact',
        'address',
    ];


    public function bons(){
        return $this->belongsToMany(Bon::class);
    }
}
