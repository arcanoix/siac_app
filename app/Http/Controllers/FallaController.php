<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Falla;

class FallaController extends Controller
{
    //

    public function index()
    {
      //$falla = Falla::all();
      $falla = Falla::with('number','cliente','users')->paginate(5);

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
      $falla_save = new Falla();

      $falla_save->number_telephone_id = $r->number_telephone_id;
      $falla_save->type_failure = $r->type_failure;
      $falla_save->status = $r->status;
      $falla_save->customer_id = $r->customer_id;
      $falla_save->address = $r->address;

      $falla_save->user_id = $r->user_id;

    // dd($falla_save);

      $falla_save->save();

      return response()->json([
          'falla_save' => $falla_save
      ]);
    }

    public function show($id)
    {
      if($falla = Falla::find($id)){

        return $falla;
      }else{
        return response()->json(['error' => 'Error no se encuentra el registro']);
      }
    }

    public function update(Request $r, $id)
    {
      if($falla_save = Falla::find($id)){
        $falla_save->number_telephone_id = $r->number_telephone_id;
        $falla_save->type_failure = $r->type_failure;
        $falla_save->status = $r->status;
        $falla_save->customer_id = $r->customer_id;
        $falla_save->address = $r->address;

        $falla_save->user_id = $r->user_id;

      // dd($falla_save);

        $falla_save->save();
        return $falla_save;
      }else{
        return response()->json(['error' => 'Error no se encuentra el registro']);
      }
    }

    public function destroy($id)
    {
      $falla_del = Falla::find($id);
      $falla_del->delete();

      return response()->json([
          'suceess' => 'correcto'
      ]);
    }
}
