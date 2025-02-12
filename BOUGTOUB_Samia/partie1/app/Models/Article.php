<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=['title','views', 'user_id'];
    public function user(){
        return $this->belongsTo(User::class);

    }
    public function comments(){
        return $this->hasMany(Comment::class);

    }
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function getCategoriesAttribute(){
        $categories = $this->categories()->get() ;
        if($this->views > 10){
            $catPopulaire = new Category();
            $catPopulaire->name = 'Populaire';
            $categories->push($catPopulaire);
        }
        return $categories ;
    }
}
