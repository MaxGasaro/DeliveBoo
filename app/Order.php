<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_name', 'customer_address', 'date','price','customer_phone','comment','status_order'];
    public function foods(){
        return $this->belongsToMany('App\Food');
    }
}
