<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\NumeroT;

class Business extends Model
{
    //
    protected $table='business';

    protected $fillable = ['name','rif','address','email','number_telephone_id','number_contact','state_id','municipality_id','parish_id','sector'];

    

   
}
