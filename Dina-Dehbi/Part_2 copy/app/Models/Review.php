<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'content', 
        'views', 
        'hike_id', 
        'user_id',
    ];

    

}
