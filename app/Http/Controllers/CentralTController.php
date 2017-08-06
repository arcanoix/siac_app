<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CentralT;
class CentralTController extends Controller
{
    //

    public function index(){
      $central = CentralT::all();

      return response()->json([
          'central' => $central
      ]);
    }

    public function store(Request $centralT)
    {
      $central = new CentralT();
      $central->name = $centralT->name;
      $central->address = $centralT->address;
      $central->parish_id = $centralT->parish_id;
      $central->sector_id = $centralT->sector_id;
      $central->tanks_id = $centralT->tanks_id;

      $central->save();

      return response()->json([
        'central' => $central
      ]);

    }

    public function destroy($id)
    {
      $find_central = CentralT::find($id);
      $find_central->delete();

      return response()->json([
          'success' => 'eliminado'
      ]);
    }
}
