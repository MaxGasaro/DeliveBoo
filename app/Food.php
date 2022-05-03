<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    protected $fillable = ['name', 'slug', 'description','price','visible','img','user_id','category_food_id'];

    public function orders(){
        return $this->belongsToMany('App\Order');
    }

    public function users(){
        return $this->belongsTo('App\User');
    }
    public function categories(){
        return $this->belongsTo('App\CategoryFood');
    }
}
