<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Naissance extends Model
{
    use HasFactory;

    protected $fillable= [
        'nom',
        'genre',
        'datenais',
        'lieunais',
        'pere',
        'mere',
        'contact',
        'address',
        'mode',
    ];

    public function declaration(){
        return $this->belongsTo(Declaration::class);
    }
}
