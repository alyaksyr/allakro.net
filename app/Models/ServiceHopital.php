<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceHopital extends Model
{
    use HasFactory;


    protected $fillable= [
        'libelle',
        'prestation',
        'contact',
        'responsable',
    ];

    public function hopital(){
        return $this->belongsTo(Hopital::class);
    }
}
