<?php
// app/Models/Strategy.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strategy extends Model
{
    use HasFactory;

    protected $fillable = ['player_id', 'title', 'content', 'vue'];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function avies()
    {
        return $this->hasMany(Avie::class);
    }
}