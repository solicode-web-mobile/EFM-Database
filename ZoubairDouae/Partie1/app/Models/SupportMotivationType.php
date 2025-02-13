<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportMotivationType extends Model
{
    protected $fillable = ['support_motivation_id', 'type_motivation_id'];
    public function supportMotivation(){
        return $this->belongsTo(SupportMotivation::class);
    }
    public function typeMotivation(){
        return $this->belongsTo(TypeMotivation::class);
    }
}
