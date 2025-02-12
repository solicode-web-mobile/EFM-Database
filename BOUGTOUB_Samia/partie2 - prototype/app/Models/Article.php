<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','views', 'user_id'];

    public function user(){
       return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function getCategoriesAttribute(){
        $categories = $this->categories()->get();
        if($this->views > 10){
            $popularCat = new Category();
            $popularCat->name = "Populaire";
            $categories->push($popularCat);
        }
        return $categories;
    }
}
