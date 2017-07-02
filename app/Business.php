<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    //
    protected $table='business';

    protected $fillable = ['name','rif','address','email','numbertelephon_id','numbercontact','state_id','municipality_id','parish_id','sector_id'];

    protected $hidden;
}
