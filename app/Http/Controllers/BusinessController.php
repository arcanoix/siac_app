<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\NumeroT;
use DB;

class BusinessController extends Controller
{
    //

    public function index()
    {
     	$business = Business::with('num')->get();
      //$business = DB::table('number_telephone')->join('business','number_telephone.id','=','business.number_telephone_id')->select('business.*','number_telephone.number')->get();

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
      $empresa->sector = $request->sector;

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

          $empresa->save();

          return response()->json([
              'empresa' =>  $empresa
          ]);


	}

  public function destroy($id)
  {
    $del_business = Business::find($id);
    $del_business->delete();

    return response()->json([
      'success' => 'ELiminado'
    ]);
  }


}
