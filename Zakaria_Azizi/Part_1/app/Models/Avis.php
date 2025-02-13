<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;
    protected $fillable = ['randonnee_id', 'commentaire', 'positif', 'vues'];

    public function randonnee()
    {
        return $this->belongsTo(Randonnee::class);
    }

    public function suggestions()
    {
        return $this->belongsToMany(Suggestion::class);
    }
}
