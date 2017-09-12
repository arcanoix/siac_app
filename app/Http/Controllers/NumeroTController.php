<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NumeroT;
class NumeroTController extends Controller
{
    //

    public function index()
    {
        $numberT = NumeroT::paginate(5);
        $response = [
         'pagination' => [
             'total' => $numberT->total(),
             'per_page' => $numberT->perPage(),
             'current_page' => $numberT->currentPage(),
             'last_page' => $numberT->lastPage(),
             'from' => $numberT->firstItem(),
             'to' => $numberT->lastItem()
         ],
         'data' => $numberT
       ];

       return $response;
    }

    public function numeroE(){
      $numero_e = NumeroT::where('status','En Espera')->get();

      return $numero_e;
    }

    public function show($id)
    {
      if($numero_e = NumeroT::find($id)){

        return $numero_e;
      }else{
        return response()->json(['error' => 'Error no se encuentra el registro']);
      }
    }

    public function update(Request $request, $id)
    {
      if($numeroN = NumeroT::find($id)){
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
        return $numeroN;
      }else{
        return response()->json(['error' => 'Error no se encuentra el registro']);
      }
    }

    public function store(Request $request)
    {
      //dd($request->all());
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
