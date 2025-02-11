<?php
// app/Models/FeedbackType.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackType extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function avies()
    {
        return $this->hasMany(Avie::class);
    }
}