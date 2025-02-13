<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Strategy extends Model
{
    protected $fillable = ['title', 'content', 'vu'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function avie(): HasMany
    {
        return $this->hasMany(Avie::class);
    }
}
