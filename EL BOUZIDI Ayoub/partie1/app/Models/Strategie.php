<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Strategie extends Model
{
    protected $fillable = ['name','number'];

    public function joueur(){
        return $this->hasOne(Joueur::class);
    }
    public function avie(){
        return $this->hasMany(Avie::class);
    }
}
