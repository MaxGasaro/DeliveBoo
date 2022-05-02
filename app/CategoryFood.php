<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryFood extends Model
{
    protected $table = 'categories_food';
    protected $fillable = ['name', 'slug'];

    public function foods(){
        return $this->hasMany('App\Food');
    }
}
