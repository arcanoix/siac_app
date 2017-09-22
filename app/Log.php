<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Log extends Model
{
    //
    //
    protected $table = 'activity_log';

    protected $fillable = ['user_id','text','ip_addres','created_at'];


    public function users(){
    	return $this->belongsTo($this->getAuthModelName(), 'user_id');
    }

     public function getAuthModelName()
    {
        if (config('activitylog.userModel')) {
            return config('activitylog.userModel');
        }
        
        //laravel 5.0 - 5.1
        if (! is_null(config('auth.model'))) {
            return config('auth.model');
        }

        //laravel 5.2
        if (! is_null(config('auth.providers.users.model'))) {
            return config('auth.providers.users.model');
        }

        throw new Exception('could not determine the model name for users');
    }

    public function scopeBusqueda($query, $dato1="", $dato2=""){
    	/*
        $resultado= $query->where('user_id','like','%'.$dato.'%')
            ->orWhere('text','like','%'.$dato.'%')
            ->orWhere('ip_address','like','%'.$dato.'%')
            ->orWhere('created_at','like','%'.$dato.'%');*/

        $resultado= $query->whereBetween('created_at', [$date1->format('Y-m-d'), $date2->format('Y-m-d')]);

        return $resultado;

    }
}
