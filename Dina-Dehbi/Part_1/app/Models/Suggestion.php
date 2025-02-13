<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    public function hike(){
        return $this->belongsTo(Hike::class);
    }
    public function reviews(){
        return $this->belongsTo(Review::class);
    }
}
