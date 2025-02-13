<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeMotivation extends Model
{
    protected $fillable = ['name'];

    public function SupportMotivation(){
        return $this->belongsToMany(SupportMotivation::class);
    }
}
