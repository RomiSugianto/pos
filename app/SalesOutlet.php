<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesOutlet extends Model
{
    protected $table = "sales_outlet";
    public $incrementing=false;

    public function salesTransaction(){
    	return $this->hasMany('App\SalesTransaction')->withTimestamps();
    }
}
