<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $primaryKey = 'role_id';
    public function users(){
    	return $this->hasMany('App\User', 'role_id', 'role_id');
    }
}
