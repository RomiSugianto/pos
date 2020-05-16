<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = "payment_method";
    public $incrementing=false;
    
    public function salesTransaction(){
    	return $this->belongsToMany('App\SalesTransaction')->withTimestamps();
    }
}
