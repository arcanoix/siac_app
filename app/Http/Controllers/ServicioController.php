<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicio;

class ServicioController extends Controller
{
    //

    public function index()
    {
      $servicio = Servicio::all();

      return response()->json([
          'servicio' => $servicio
      ]);
    }

    public function store(Request $request)
    {
            $servicio_save = new Servicio();

            $servicio_save->name = $request->name;
            $servicio_save->description = $request->description;

            $servicio_save->save();

            return response()->json([
                'servicio_save' => $servicio_save
            ]);
    }

    public function destroy($id)
    {
          $find_servicio = Servicio::find($id);
          $find_servicio->delete();

          return response()->json([
            'success' => 'eliminado'
          ]);
    }
}
