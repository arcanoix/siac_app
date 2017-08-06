<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanque extends Model
{
    //
    protected $table='tanks';

    protected $fillable = ['name','address','ads_id'];
}
