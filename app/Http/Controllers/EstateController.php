<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\Municipality;
use App\Parish;
use App\Sector;

class EstateController extends Controller
{
    //
    //
    public function index()
    {
    	$estado = State::with('municipality')->get();

    	return response()->json([
    			'estado' => $estado
    		]);
    }

    public function getS(){
      $sector = Sector::with('parroquia')->get();

      return response()->json([
          'sector' => $sector
      ]);
    }

    public function getM()
    {
    	$municipio = Municipality::with('states')->get();

    	return response()->json([
    			'municipio' => $municipio
    		]);
    }

    public function getMID(){
    		$municipio = Municipality::where('state_id',7)->get();
    		$data = [];
    		$data[0] = [
    			'id' => 0,
    			'name' => 'Seleccione',
    		];

    		foreach($municipio as $key => $mun){
    			$data[$key+1] =[
    					'id' => $mun->id,
    					'name' => $mun->name,
    			];
    		}

    		return response()->json($data);
    }

    public function getParish($id){
    		$parish = Parish::where('municipality_id',$id)->get();

    		$data = [];
    		$data[0] = ['id' => 0 , 'name' => 'Seleccione',];

    			foreach($parish as $key => $par){
    			$data[$key+1] =[
    					'id' => $par->id,
    					'name' => $par->name,
    			];
    		}


    		return response()->json($data);
    }

    public function getP(){
        $parish = Parish::all();

        return response()->json($parish);
    }

}
