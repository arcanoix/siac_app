<?php

namespace App;

use Laratrust\LaratrustRole;
use App\User;

class Role extends LaratrustRole
{
    //
    protected $table="roles";

    protected $fillable =['rol'];
    
    public function users()
    {
    	return $this->belongsToMany(User::class,'user_id','id');
    }
}
