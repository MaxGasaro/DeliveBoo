<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['name', 'slug', 'description','price','visible','img'];

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
