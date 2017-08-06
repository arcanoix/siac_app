<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentralT extends Model
{
    //
    protected $table = 'central_telephone';

    protected $fillable = ['name','address','parish_id','sector_id','tanks_id'];
}
