<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable =  ['title'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class , 'article_category');
    }
    

}
