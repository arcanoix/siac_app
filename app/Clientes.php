<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\NumeroT;

class Clientes extends Model
{
    //
    protected $table = 'customers';

    protected $fillable = ['name','last_name','identification_card','address','email','state_id','municipality_id','parish_id','sector_id','number_telephone_id'];

     public function num(){
      return $this->belongsTo(NumeroT::class,'number_telephone_id','id');
    }
    
}
