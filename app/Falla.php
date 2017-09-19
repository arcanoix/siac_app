<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\NumeroT;
use App\Clientes;
use App\User;


class Falla extends Model
{
    //
    protected $table='failure';

    protected $fillable = ['number_telephone_id','type_failure','status','customer_id','address','user_id','lat','longitud'];

    public function number()
    {
      return $this->belongsTo(NumeroT::class, 'number_telephone_id','id');
    }

    public function cliente()
    {
      return $this->belongsTo(Clientes::class, 'customer_id', 'id');
    }

     

    public function users(){
      return $this->belongsTo(User::class,'user_id','id');
    }

}
