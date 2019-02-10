<?php

namespace App;

use App\Item;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    

    public function items(){
    	return $this->hasMany('App\Item');
    }
}
