<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CentralT;
class CentralTController extends Controller
{
    //

    public function index(){
      $central = CentralT::with('parroquia','sector','tanque')->paginate(5);

      $response = [
       'pagination' => [
           'total' => $central->total(),
           'per_page' => $central->perPage(),
           'current_page' => $central->currentPage(),
           'last_page' => $central->lastPage(),
           'from' => $central->firstItem(),
           'to' => $central->lastItem()
       ],
       'data' => $central
   ];

   return $response;
    }

    public function store(Request $centralT)
    {
      $central = new CentralT();
      $central->name = $centralT->name;
      $central->address = $centralT->address;
      $central->parish_id = $centralT->parish_id;
      $central->sector_id = $centralT->sector_id;
      $central->tanks_id = $centralT->tanks_id;

      //dd($central);

      $central->save();

      return response()->json([
        'central' => $central
      ]);

    }

    public function show($id)
    {
      if($central = CentralT::find($id)){

        return $central;
      }else{
        return response()->json(['error' => 'Error no se encuentra el registro']);
      }
    }

    public function update(Request $centralT, $id)
    {
      if($central = CentralT::find($id)){
        $central->name = $centralT->name;
        $central->address = $centralT->address;
        $central->parish_id = $centralT->parish_id;
        $central->sector_id = $centralT->sector_id;
        $central->tanks_id = $centralT->tanks_id;

        //dd($central);

        $central->save();
        return $central;
      }else{
        return response()->json(['error' => 'Error no se encuentra el registro']);
      }
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
