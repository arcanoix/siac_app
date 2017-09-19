<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FallasE;
use DB;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;
use Activity;

class FallasEController extends Controller
{
    //
      public function index()
    {
      //$falla = Falla::all();
      $falla = FallasE::with('number','empresa','users')->paginate(5);

      $response = [
       'pagination' => [
           'total' => $falla->total(),
           'per_page' => $falla->perPage(),
           'current_page' => $falla->currentPage(),
           'last_page' => $falla->lastPage(),
           'from' => $falla->firstItem(),
           'to' => $falla->lastItem()
       ],
       'data' => $falla
   ];

   return $response;
    }

     


    public function store(Request $r)
    {
      $falla_save = new FallasE();

      $falla_save->number_telephone_id = $r->number_telephone_id;
      $falla_save->type_failure = $r->type_failure;
      $falla_save->status = $r->status;
      $falla_save->business_id = $r->customer_id;
      $falla_save->address = $r->address;

      $falla_save->user_id = $r->user_id;

      $falla_save->lat = $r->latitude;
      $falla_save->longitud = $r->longitude;

     //dd($falla_save);
 Activity::log('Ha registrado una Falla');
      $falla_save->save();

      return response()->json([
          'falla_save' => $falla_save
      ]);
    }

    public function show($id)
    {
      if($falla = FallasE::find($id)){

        return $falla;
      }else{
        return response()->json(['error' => 'Error no se encuentra el registro']);
      }
    }

    public function update(Request $r, $id)
    {
      if($falla_save = FallasE::find($id)){
        $falla_save->number_telephone_id = $r->number_telephone_id;
        $falla_save->type_failure = $r->type_failure;
        $falla_save->status = $r->status;
        $falla_save->business_id = $r->customer_id;
        $falla_save->address = $r->address;

        $falla_save->user_id = $r->user_id;

      // dd($falla_save);
         Activity::log('Ha actualizado una falla');
        $falla_save->save();
        return $falla_save;
      }else{
        return response()->json(['error' => 'Error no se encuentra el registro']);
      }
    }

    public function destroy($id)
    {
      $falla_del = FallasE::find($id);
       Activity::log('Ha eliminado una falla');
      $falla_del->delete();

      return response()->json([
          'suceess' => 'correcto'
      ]);
    }
}
