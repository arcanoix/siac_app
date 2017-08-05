<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    //
    protected $table ='ads';

    protected $fillable = ['name','type_ads','cc','cl','pc','pl','address','sleeve_id','state_id','municipality_id','parish_id','sector_id','coord_x','coord_y'];
    
}
