<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function feedBack(): HasMany
    {
        return $this->hasMany(FeedBack::class);
    }
}
