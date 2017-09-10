<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
class ClientesController extends Controller
{
    //
    public function index()
    {
      $clientes = Clientes::paginate(5);

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

      $cliente_new->save();

      return response()->json([
        'cliente_new' => $cliente_new
      ]);
    }

     public function destroy($id)
     {
       $find_cliente = Clientes::find($id);
       $find_cliente->delete();

       return response()->json([
         'success' => 'delete'
       ]);
     }
}
