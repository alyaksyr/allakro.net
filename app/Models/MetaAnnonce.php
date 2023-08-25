<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MetaAnnonce extends Model
{
    use HasFactory;


    protected $fillable = [
        'type',
        'key',
        'value',
    ];

    public function annonce(){
        return $this->belongsTo(Annonce::class);
    }
}
