<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NumeroT extends Model
{
    //
    protected $table ='number_telephone';

    protected $fillable =['code','number','status','cc','cl','pc','pl'];

    //protected $hidden = ['id'];
}
