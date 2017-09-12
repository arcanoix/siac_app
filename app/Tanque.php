<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ads;

class Tanque extends Model
{
    //
    protected $table='tanks';

    protected $fillable = ['name','address','ads_id'];

    public function ads(){
      return $this->belongsTo(Ads::class,'ads_id','id');
    }
}
