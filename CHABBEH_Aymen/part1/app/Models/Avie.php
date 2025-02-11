<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Avie extends Model
{
    protected $fillable = [
        'content'
    ];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function strategy():BelongsTo
    {
        return $this->belongsTo(Strategy::class);
    }

    public function feedbackType(): HasMany
    {
        return $this->hasMany(FeedbackType::class);
    }
}
