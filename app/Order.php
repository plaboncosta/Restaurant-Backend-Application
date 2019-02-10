<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function pay(){
    	return $this->belongsTo('App\Pay');
    }

    public function item(){
    	return $this->belongsTo('App\Item', 'item_id', 'item_id');
    }


    public function category(){
    	return $this->belongsTo('App\Category');
    }
}
