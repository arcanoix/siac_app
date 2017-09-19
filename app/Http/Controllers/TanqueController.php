<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tanque;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;
use Activity;

class TanqueController extends Controller
{
    //

    public function index()
    {
      $tanque = Tanque::with('ads')->paginate(5);

      $response = [
       'pagination' => [
           'total' => $tanque->total(),
           'per_page' => $tanque->perPage(),
           'current_page' => $tanque->currentPage(),
           'last_page' => $tanque->lastPage(),
           'from' => $tanque->firstItem(),
           'to' => $tanque->lastItem()
       ],
       'data' => $tanque
   ];

   return $response;

    }

    public function store(Request $request)
    {
      $tanque = new Tanque();
      $tanque->name = $request->name;
      $tanque->address = $request->address;
      $tanque->ads_id = $request->ads_id;

      //dd($tanque);
Activity::log('Ha registrado un tanque');
      $tanque->save();

      return response()->json([
          'tanque' => $tanque
      ]);

    }

    public function show($id)
    {
      if($tanque = Tanque::find($id)){

        return $tanque;
      }else{
        return response()->json(['error' => 'Error no se encuentra el registro']);
      }
    }

    public function update(Request $request, $id)
    {
      if($tanque = Tanque::find($id)){
        $tanque->name = $request->name;
        $tanque->address = $request->address;
        $tanque->ads_id = $request->ads_id;

        //dd($tanque);
Activity::log('Ha actualizado un tanque');
        $tanque->save();
        return $tanque;
      }else{
        return response()->json(['error' => 'Error no se encuentra el registro']);
      }
    }

    public function destroy($id)
    {
      $tanque_del = Tanque::find($id);
      Activity::log('Ha eliminado un tanque');
      $tanque_del->delete();

      return response()->json([
          'suceess' => 'correcto'
      ]);
    }
}
