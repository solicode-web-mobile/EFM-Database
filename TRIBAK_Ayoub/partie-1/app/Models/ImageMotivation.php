<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageMotivation extends Model
{
    protected $fillable = ['url', 'employe_id', 'views'];

    public function employes(){
        return $this->belongsTo(Employe::class);
    }

    public function support_motivations(){
        return $this->hasMany(SupportMotivation::class);
    }
}
