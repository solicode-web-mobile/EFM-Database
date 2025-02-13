<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FeedBack extends Model
{

    protected $fillable = [
        'avie_id',
        'feedback_type_id',
    ];
    public function avie(): BelongsToMany
    {
        return $this->belongsToMany(Avie::class);
    }

    public function feedbackType(): BelongsTo
    {
        return $this->belongsTo(FeedbackType::class);
    }
}
