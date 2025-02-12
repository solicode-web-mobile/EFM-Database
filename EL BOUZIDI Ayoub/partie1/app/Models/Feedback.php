<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable =['content'];

    public function avie(){
        return $this->belongsToMany(Avie::class);
    }
}
