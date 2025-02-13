<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MotivationType extends Model
{
    public function employe(){
        return $this->hasMany(SupportMessage::class);
    }
}
