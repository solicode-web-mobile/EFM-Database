<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['content','user_id','views','hike_id'];
    public function user(){
       return $this->belongsTo(User::class);
    }
    public function hikes(){
        return $this->belongsTo(Hike::class);
     }
    public function suggestions(){
       return $this->hasMany(Suggestion::class);
    }
}
