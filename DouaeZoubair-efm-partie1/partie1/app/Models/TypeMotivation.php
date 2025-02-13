<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeMotivation extends Model
{
    protected $fillable = ['name'];

    public function supportMotivation(){
        return $this->belongsToMany(supportMotivation::class);
    }


}
