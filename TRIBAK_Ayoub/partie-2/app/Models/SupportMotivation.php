<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportMotivation extends Model
{
    protected $fillable = ['content','image_motivation_id', 'views', 'reactions'];

    public function imageMotivation(){
        return $this->belongsTo(ImageMotivation::class);
    }

    public function typeMotivations()
    {
        return $this->belongsToMany(TypeMotivation::class, 'support_motivation_types', 'support_motivation_id', 'type_motivation_id');
    }
}
