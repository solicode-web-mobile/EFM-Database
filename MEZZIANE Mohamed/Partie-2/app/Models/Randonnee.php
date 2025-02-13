<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Randonnee extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'views', 'member_id'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function avis()
    {
        return $this->hasMany(Avis::class);
    }
}
