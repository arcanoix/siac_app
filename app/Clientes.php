<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    //
    protected $table = 'customers';

    protected $fillable = ['name','last_name','identification_card','address','email','state_id','municipality_id','parish_id','sector_id','number_telephone_id'];
    
}
