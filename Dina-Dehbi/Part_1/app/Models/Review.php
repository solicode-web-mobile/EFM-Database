<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function hike(){
        return $this->belongsTo(Hike::class);
    }
    public function suggetions(){
        return $this->hasMany(Suggestion::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
