<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Parish;
use App\Sector;
use App\Tanque;

class CentralT extends Model
{
    //
    protected $table = 'central_telephone';

    protected $fillable = ['name','address','parish_id','sector_id','tanks_id'];


    public function parroquia()
    {
      return $this->belongsTo(Parish::class,'parish_id','id');
    }

    public function sector()
    {
      return $this->belongsTo(Sector::class,'sector_id','id');
    }

    public function tanque()
    {
      return $this->belongsTo(Tanque::class,'tanks_id','id');
    }
}
