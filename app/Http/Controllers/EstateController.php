<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\Municipality;
use App\Parish;
use App\Sector;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;
use Activity;

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

    public function sector(Request $request){
      $sector = new Sector;

      $sector->name = $request->name;
      $sector->parish_id = $request->parish_id;
      $sector->codigo_postal = $request->codigo_postal;
 Activity::log('Ha registrado un sector');
      $sector->save();

      return response()->json($sector);
    }

    public function getS(){
      $sector = Sector::with('parroquia')->paginate(5);

      $response = [
       'pagination' => [
           'total' => $sector->total(),
           'per_page' => $sector->perPage(),
           'current_page' => $sector->currentPage(),
           'last_page' => $sector->lastPage(),
           'from' => $sector->firstItem(),
           'to' => $sector->lastItem()
       ],
       'data' => $sector
   ];

   return $response;
    }

    public function sectorT()
    {
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

    public function show($id){

      if($sector = Sector::find($id)){

        return $sector;
      }else{
        return response()->json(['error' => 'Error no se encuentra el registro']);
      }
    }

    public function update(Request $request, $id){
      if($sector = Sector::find($id)){
        $sector->name = $request->name;
        $sector->parish_id = $request->parish_id;
        $sector->codigo_postal = $request->codigo_postal;
         Activity::log('Ha actualizado un Sector');
        $sector->save();
        return $sector;
      }else{
        return response()->json(['error' => 'Error no se encuentra el registro']);
      }
    }

}
