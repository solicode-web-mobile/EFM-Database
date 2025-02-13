<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportMessage extends Model
{
    public function employe(){
        return $this->belongsTo(MotivationType::class);
    }
}
