<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = array('orderNo','customer','customer_id','origin','tf','show','boothNo','carrier','estPrice','shipDate','dlvDate','stopNo','comments');

    public function album(){
      return $this->belongsTo('App\Customer');
    }
}
