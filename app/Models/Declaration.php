<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Declaration extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'slug',
        'status',
    ];

    public function user(){
        return $this->hasMany(User::class);
    }

    public function naissance(){
        return $this->hasOne(Naissance::class);
    }

    public function decede(){
        return $this->hasOne(Decede::class);
    }

    public function amenage(){
        return $this->hasOne(Amenage::class);
    }

    public function demenage(){
        return $this->hasOne(Demenage::class);
    }
}
