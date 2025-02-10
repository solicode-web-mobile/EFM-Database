<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeMotivation extends Model
{
    protected $fillable = ['name'];

    public function supportMotivations()
    {
        return $this->belongsToMany(SupportMotivation::class);
    }
}
