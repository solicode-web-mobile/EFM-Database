<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillables = ['content', 'views'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
