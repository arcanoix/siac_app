<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicio;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;
use Activity;

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
            Activity::log('Ha registrado un servicio');
            return response()->json([
                'servicio_save' => $servicio_save
            ]);
    }

    public function show($id)
    {
      if($servicio = Servicio::find($id)){

        return $servicio;
      }else{
        return response()->json(['error' => 'Error no se encuentra el registro']);
      }
    }

    public function update(Request $request, $id)
    {
      if($servicio_save = Servicio::find($id)){
        $servicio_save->name = $request->name;
        $servicio_save->description = $request->description;
        Activity::log('Ha actualizado un servicio');
        $servicio_save->save();
        return $servicio_save;
      }else{
        return response()->json(['error' => 'Error no se encuentra el registro']);
      }
    }

    public function destroy($id)
    {
          $find_servicio = Servicio::find($id);
          Activity::log('Ha eliminado un Servicio');
          $find_servicio->delete();

          return response()->json([
            'success' => 'eliminado'
          ]);
    }
}
