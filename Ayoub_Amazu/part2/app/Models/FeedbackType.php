<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FeedbackType extends Model
{
    protected $fillable = [
        'title'
    ];
    public function feedBack():HasOne
    {
        return $this->hasOne(FeedBack::class);
    }
}
