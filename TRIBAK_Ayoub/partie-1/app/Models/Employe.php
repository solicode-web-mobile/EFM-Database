<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $fillable = ['name'];

    public function ImageMotivation(){
        return $this->hasOne(ImageMotivation::class);
    }

    public function support_motivations()
    {
        return $this->hasMany(SupportMotivation::class);
    }
}
