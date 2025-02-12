<?php

namespace App\Models;
use App\Models\Strategie;
use Illuminate\Database\Eloquent\Model;

class Avie extends Model
{
    protected $fillable = ['content'];

    public function strategie(){
        return $this->belongsTo(Strategie::class);
    }
    public function feedback(){
        return $this->belongsToMany(Feedback::class);
    }
}
