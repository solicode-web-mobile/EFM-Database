<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillables = [
        'name',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
