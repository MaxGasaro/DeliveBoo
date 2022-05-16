<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    protected $fillable = ['name', 'slug', 'description','price','visible','img','user_id','category_id'];
    public function orders(){
        return $this->belongsToMany('App\Order');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
