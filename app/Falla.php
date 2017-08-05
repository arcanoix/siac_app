<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Falla extends Model
{
    //
    protected $table='failure';

    protected $fillable = ['number_telephone_id','type_failure','status','customer_id','address'];
}
