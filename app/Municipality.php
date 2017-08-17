<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\State;

class Municipality extends Model
{
    //
    //
    protected $table = 'municipality';

    protected $fillable=['name','state_id'];


    public function states()
    {
    	return $this->belongsTo(State::class,'id');
    }
}
