<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PharmacieGarde extends Model
{
    use HasFactory;

    protected $fillable= [
        'debut',
        'fini',
        'responsable',
        'status',
    ];

    public function pharmacie(){
        return $this->belongsTo(Pharmacie::class);
    }
}
