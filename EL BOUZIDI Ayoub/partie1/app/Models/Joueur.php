<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    protected $fillable = ['name','number'];

    public function strategie(){
        return $this->hasOne(Strategie::class);
    }
}
