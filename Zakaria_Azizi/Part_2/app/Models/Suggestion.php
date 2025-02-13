<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;
    protected $fillable = ['contenu'];

    public function avis()
    {
        return $this->belongsToMany(Avis::class);
    }
}
