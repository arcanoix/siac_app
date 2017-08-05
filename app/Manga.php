<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    //
    protected $table='sleeve';

    protected $fillable=['name','description','address'];
}
