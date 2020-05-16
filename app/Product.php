<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    public $incrementing=false;

    public function salesTransaction(){
    	return $this->belongsToMany('App\SalesTransaction')->withTimestamps();
    }
}
