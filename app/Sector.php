<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Parish;

class Sector extends Model
{
    //
    protected $fillable=['name'];

    protected $table ='sector';

    public function parroquia()
    {
      return $this->belongsTo(Parish::class,'parish_id','id');
    }
}
