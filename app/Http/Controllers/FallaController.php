<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Falla;

class FallaController extends Controller
{
    //

    public function index()
    {
      $falla = Falla::all();

      return response()->json([
          'falla' => $falla
      ]);
    }

    public function store(Request $r)
    {
      $falla_save = new Falla();

      $falla_save->number_telephone_id = $r->number_telephone_id;
      $falla_save->type_failure = $r->type_failure;
      $falla_save->status = $r->status;
      $falla_save->customer_id = $r->customer_id;
      $falla_save->address = $r->address;

      $falla_save->save();

      return response()->json([
          'falla_save' => $falla_save
      ]);
    }

    public function destroy($id)
    {
      $falla_del = Falla:find($id);
      $falla_del->delete();

      return response()->json([
          'suceess' => 'correcto'
      ]);
    }
}
