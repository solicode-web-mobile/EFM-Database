<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeedbackType extends Model
{
    protected $fillable = [
        'title'
    ];
    public function avie():BelongsTo
    {
        return $this->belongsTo(Avie::class);
    }
}
