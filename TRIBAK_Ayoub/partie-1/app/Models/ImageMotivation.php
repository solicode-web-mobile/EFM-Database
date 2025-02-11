<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageMotivation extends Model
{
    protected $fillable = ['url', 'employe_id', 'views'];

    public function employe(){
        return $this->belongsTo(Employe::class);
    }

    public function supportMotivations(){
        return $this->hasMany(SupportMotivation::class);
    }
}
