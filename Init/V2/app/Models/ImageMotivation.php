<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageMotivation extends Model
{
    protected $fillable = ['url', 'employe_id', 'views'];
}
