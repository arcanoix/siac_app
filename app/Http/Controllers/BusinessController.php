<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use DB;

class BusinessController extends Controller
{
    //

    public function index()
    {
     	//$business = Business::with('numeroTelefono')->get();
      $business = DB::table('number_telephone')->join('business','number_telephone.id','=','business.number_telephone_id')->select('business.*','number_telephone.number')->get();

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
