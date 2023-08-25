<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decede extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'genre',
        'datenais',
        'datedeces',
        'profession',
        'lieu',
        'motif',
        'referant',
        'contact',
        'address',
        'status'
    ];


    public function declaration(){
        return $this->belongsTo(Declaration::class);
    }
}
