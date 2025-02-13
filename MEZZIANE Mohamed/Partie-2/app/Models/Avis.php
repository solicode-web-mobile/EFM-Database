<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'views', 'randonnee_id'];

    public function randonnee()
    {
        return $this->belongsTo(Randonnee::class);
    }

    public function suggestions()
    {
        return $this->belongsToMany(Suggestion::class, 'avis_suggestion');
    }
}
