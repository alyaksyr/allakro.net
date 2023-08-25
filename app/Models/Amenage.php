<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenage extends Model
{
    use HasFactory;

    protected $fillable = [

        'nom',
        'genre',
        'datenais',
        'datearrive',
        'contact',
        'address',
        'profession',
        'provenance',
        'mode',
    ];

    public function declaration(){
        return $this->belongsTo(Declaration::class);
    }
}
