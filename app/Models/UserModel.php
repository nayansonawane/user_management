<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = "user";

    protected $fillable = [
    						'name',
    						'country',
    						'email',
    						'password',
    						'about',
    						'mobile_number',
    						'dob'
    					];

    public function role_user_details()
    {
    	return $this->hasOne('App\Models\RoleUserModel','user_id','id');
    }
}
