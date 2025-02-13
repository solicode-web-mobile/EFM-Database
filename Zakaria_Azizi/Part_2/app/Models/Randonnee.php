<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Randonnee extends Model
{
    use HasFactory; 
    protected $fillable = ['nom', 'membre_id', 'vues'];

    public function membre()
    {
        return $this->belongsTo(Membre::class);
    }

    public function avis()
    {
        return $this->hasMany(Avis::class);
    }
}
