<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NumeroT;
class NumeroTController extends Controller
{
    //

    public function index()
    {
        $numberT = NumeroT::all();

        return response()->json([
          'numberT' => $numberT
        ]);
    }

    public function store(Request $request)
    {
      $numeroN = new NumeroT();

      $numeroN->code = $request->code;
      $numeroN->number = $request->number;
      $numeroN->status = $request->status;
      $numeroN->cc = $request->cc;
      $numeroN->cl = $request->cl;
      $numeroN->pc = $request->pc;
      $numeroN->pl = $request->pl;
      $numeroN->sleeve_id = $request->sleeve_id;

    //  dd($numeroN);

      $numeroN->save();
       return response()->json([
           'numeroN' => $numeroN
       ]);
    }

    public function destroy($id)
    {
      $findNumber = NumberT::find($request->id);
      $findNumber->delete();

      return response()->json([
          'success' => 'Se elimino correctamente'
      ]);
    }
}
