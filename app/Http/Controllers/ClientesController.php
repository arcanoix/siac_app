<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use App\NumeroT;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;
use Activity;

class ClientesController extends Controller
{
    //
    public function index()
    {
      $clientes = Clientes::with('num')->paginate(5);

      $response = [
       'pagination' => [
           'total' => $clientes->total(),
           'per_page' => $clientes->perPage(),
           'current_page' => $clientes->currentPage(),
           'last_page' => $clientes->lastPage(),
           'from' => $clientes->firstItem(),
           'to' => $clientes->lastItem()
       ],
       'data' => $clientes
   ];

   return $response;
    }

    public function store(Request $request)
    {
      $cliente_new = new Clientes();

      $cliente_new->name = $request->name;
      $cliente_new->last_name = $request->last_name;
      $cliente_new->identification_card = $request->identification_card;
      $cliente_new->address = $request->address;
      $cliente_new->email = $request->email;
      $cliente_new->state_id = $request->state_id;
      $cliente_new->municipality_id = $request->municipality_id;
      $cliente_new->parish_id = $request->parish_id;
      $cliente_new->sector_id = $request->sector_id;
      $cliente_new->number_telephone_id = $request->number_telephone_id;


       if($find_number = NumeroT::find($request->number_telephone_id))
          {
              $valor = $find_number->status;

                if($valor != "Activo")
                {
                  $find_number->status = "Activo";
                }else{
                  $find_number->status = $valor;
                return  response()->json([
                    "error" => "Error al asignar numero telefonico"
                  ]);
                }


                $find_number->save();
           }
 Activity::log('Ha registrado un Cliente');
      $cliente_new->save();

      return response()->json([
        'cliente_new' => $cliente_new
      ]);
    }

    public function show($id)
    {
      if($cliente = Clientes::find($id)){

        return $cliente;
      }else{
        return response()->json(['error' => 'Error no se encuentra el registro']);
      }
    }

    public function update(Request $request, $id)
    {
      if($cliente_new = Clientes::find($id)){
        $cliente_new->name = $request->name;
        $cliente_new->last_name = $request->last_name;
        $cliente_new->identification_card = $request->identification_card;
        $cliente_new->address = $request->address;
        $cliente_new->email = $request->email;
        $cliente_new->state_id = $request->state_id;
        $cliente_new->municipality_id = $request->municipality_id;
        $cliente_new->parish_id = $request->parish_id;
        $cliente_new->sector_id = $request->sector_id;
        $cliente_new->number_telephone_id = $request->number_telephone_id;

        if($find_number = NumeroT::find($request->number_telephone_id))
          {
              $valor = $find_number->status;

                if($valor != "Activo")
                {
                  $find_number->status = "Activo";
                }else{
                  $find_number->status = $valor;
                return  response()->json([
                    "error" => "Error al asignar numero telefonico"
                  ]);
                }

                $find_number->save();
           }

        //dd($cliente_new);
            Activity::log('Ha actualizado un cliente');
        $cliente_new->save();
        
        return $cliente_new;
      }else{
        return response()->json(['error' => 'Error no se encuentra el registro']);
      }
    }

     public function destroy($id)
     {
       $find_cliente = Clientes::find($id);
        Activity::log('Ha eliminado un Cliente');
       $find_cliente->delete();

       return response()->json([
         'success' => 'delete'
       ]);
     }
}
