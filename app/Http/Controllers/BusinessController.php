<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\NumeroT;
use DB;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;
use Activity;

class BusinessController extends Controller
{
    //

    public function index()
    {
     	$business = Business::with('num')->paginate(5);
      //$business = DB::table('number_telephone')->join('business','number_telephone.id','=','business.number_telephone_id')->select('business.*','number_telephone.number')->get();

     //	return $business;
     $response = [
      'pagination' => [
          'total' => $business->total(),
          'per_page' => $business->perPage(),
          'current_page' => $business->currentPage(),
          'last_page' => $business->lastPage(),
          'from' => $business->firstItem(),
          'to' => $business->lastItem()
      ],
      'data' => $business
  ];

  return $response;

    }

     public function indexb()
    {
      $business = Business::with('num')->get();
      

  return $business;

    }

	public function store(Request $request)
	{
      $empresa = New Business();
      $empresa->name = $request->name;
      $empresa->rif = $request->rif;
      $empresa->address = $request->address;
      $empresa->email = $request->email;
      $empresa->number_telephone_id = $request->number_telephone_id;
      $empresa->number_contact = $request->number_contact;
      $empresa->state_id = $request->state_id;
      $empresa->municipality_id = $request->municipality_id;
      $empresa->parish_id = $request->parish_id;
      $empresa->sector_id = $request->sector_id;

          //  dd($empresa);
          if($find_number = NumeroT::find($request->number_telephone_id))
          {
              $valor = $find_number->status;

                if($valor != "Activo")
                {
                  $find_number->status = "Activo";
                }else{
                  $find_number->status = $valor;
                return  response()->json([
                    "error" => "Error al asignar numero telefonico"
                  ]);
                }
                $find_number->save();
           }
            Activity::log('Ha registrado una empresa');

          $empresa->save();

          return response()->json([
              'empresa' =>  $empresa
          ]);


	}

  public function show($id){


      if($business = Business::find($id)){

        return $business;
      }else{
        return response()->json(['error' => 'Error no se encuentra el registro']);
      }

  }

  public function update(Request $request, $id){
    if($business = Business::find($id)){
      $business->name = $request->name;
      $business->rif = $request->rif;
      $business->address = $request->address;
      $business->email = $request->email;
      $business->number_telephone_id = $request->number_telephone_id;
      $business->number_contact = $request->number_contact;
      $business->state_id = $request->state_id;
      $business->municipality_id = $request->municipality_id;
      $business->parish_id = $request->parish_id;
      $business->sector_id = $request->sector_id;

      if($find_number = NumeroT::find($request->number_telephone_id))
          {
              $valor = $find_number->status;

                if($valor != "Activo")
                {
                  $find_number->status = "Activo";
                }else{
                  $find_number->status = $valor;
                return  response()->json([
                    "error" => "Error al asignar numero telefonico"
                  ]);
                }
                $find_number->save();
           }
      Activity::log('Ha actualizado una empresa');

      $business->save();
      
      return $business;
    }else{
      return response()->json(['error' => 'Error no se encuentra el registro']);
    }

  }

  public function destroy($id)
  {
    $del_business = Business::find($id);
     Activity::log('Ha eliminado una empresa');

    $del_business->delete();

    return response()->json([
      'success' => 'ELiminado'
    ]);
  }


}
