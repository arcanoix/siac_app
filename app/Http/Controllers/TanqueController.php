<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tanque;

class TanqueController extends Controller
{
    //

    public function index()
    {
      $tanque = Tanque::all();

      return response()->json([
        'tanque' => $tanque
      ]);

    }

    public function store(Request $request)
    {
      $tanque = new Tanque();
      $tanque->name = $request->name;
      $tanque->address = $request->address;
      $tanque->ads_id = $request->ads_id;

      $tanque->save();

      return response()->json([
          'tanque' => $tanque
      ]);

    }

    public function destroy($id)
    {
      $tanque_del = Tanque::find($id);
      $tanque_del->delete();

      return response()->json([
          'suceess' => 'correcto'
      ]);
    }
}
