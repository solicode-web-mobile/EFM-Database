<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportMotivation extends Model
{
    protected $fillable = ['content','image_id', 'views', 'reactions'];

    public function imageMotivation(){
        return $this->belongsTo(ImageMotivation::class, 'image_id');
    }

    public function motivationTypes()
    {
        return $this->belongsToMany(TypeMotivation::class);
    }

    public function employes()
    {
        return $this->belongsTo(Employe::class);
    }
}
