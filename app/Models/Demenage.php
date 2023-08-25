<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demenage extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'genre',
        'datenais',
        'depart',
        'profession',
        'destination',
        'contact',
        'address',
    ];


    public function declaration(){
        return $this->belongsTo(Declaration::class);
    }
}
