<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Municipality;

class State extends Model
{
    //
    //
    protected $table ='state';

    protected $fillable=['name'];

    public function municipality()
    {
    	return $this->hasMany(Municipality::class,'state_id','id');
    }
}
