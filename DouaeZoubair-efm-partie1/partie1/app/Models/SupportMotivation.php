<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportMotivation extends Model
{
    protected $fillable = ['content','image_id', 'views', 'reactions'];

    public function imageMotivation(){
        return $this->belongsTo(imageMotivation::class);
    }

    public function typeMotivation(){
        return $this->belongsTo(TypeMotivation::class , 'support_motivation_types' , 'type_motivation_id' , 'support_motivation_id');
    }

}
