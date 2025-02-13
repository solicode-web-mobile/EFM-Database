<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'views', 'randonnee_id'];

    public function Randonnee() {
        return $this->belongsTo(Randonnee::class);
    }

    public function Suggestion() {
        return $this->belongsToMany(Avis::class, 'avis_suggestion');
    }

}
