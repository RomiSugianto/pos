<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = "sales";
    public $incrementing=false;

    public function salesTransaction(){
    	return $this->hasMany('App\SalesTransaction')->withTimestamps();
    }
}
