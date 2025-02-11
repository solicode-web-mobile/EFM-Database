<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $fillable = ['name'];

    public function imageMotivation(){
        return $this->hasOne(ImageMotivation::class);
    }
}
