<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\NumeroT;
use App\Business;
use App\User;

class FallasE extends Model
{
     protected $table='failure_e';

    protected $fillable = ['number_telephone_id','type_failure','status','business_id','address','user_id','lat','longitud'];

    public function number()
    {
      return $this->belongsTo(NumeroT::class, 'number_telephone_id','id');
    }

    public function empresa()
    {
      return $this->belongsTo(Business::class, 'business_id', 'id');
    }

     
    public function users(){
      return $this->belongsTo(User::class,'user_id','id');
    }
}
