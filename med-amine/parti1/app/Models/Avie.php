<?php
// app/Models/Avie.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avie extends Model
{
    use HasFactory;

    protected $fillable = ['player_id', 'strategy_id', 'feedback_type', 'content'];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function strategy()
    {
        return $this->belongsTo(Strategy::class);
    }

    public function feedbackType()
    {
        return $this->belongsTo(FeedbackType::class);
    }
}