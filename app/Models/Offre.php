<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'detail',
    ];


    public function hopital(){
        return $this->belongsToMany(Hopital::class);
    }
    
}
