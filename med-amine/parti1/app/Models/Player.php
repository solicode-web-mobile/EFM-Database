<?php
// app/Models/Player.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'num'];

    public function strategies()
    {
        return $this->hasMany(Strategy::class);
    }

    public function avies()
    {
        return $this->hasMany(Avie::class);
    }
}
