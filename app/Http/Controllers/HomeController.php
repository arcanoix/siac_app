<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Log;
use Carbon\Carbon;





class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.tablero');
    }

    public function log(){
                $logs = Activity::with('user')->paginate(5);
                    $response = [
                          'pagination' => [
                              'total' => $logs->total(),
                              'per_page' => $logs->perPage(),
                              'current_page' => $logs->currentPage(),
                              'last_page' => $logs->lastPage(),
                              'from' => $logs->firstItem(),
                              'to' => $logs->lastItem()
                          ],
                          'data' => $logs
                      ];

                return $response;
    }




    public function buscar($dato1="", $dato2="")
    {
             
        //dd($dato1,$dato2);
       //$dato1 = Carbon::parse($dato1)->subDay(1);
          $dato1 = Carbon::parse($dato1);               
         //$dato2 = Carbon::parse($dato2)->subDay(1);
          $dato2 = Carbon::parse($dato2)->addDay(1);

     
        $log = Activity::Busqueda($dato1,$dato2)->with('user')->whereBetween('created_at', [$dato1->format('Y-m-d'), $dato2->format('Y-m-d')])->paginate(5);

        $response = [
                      'pagination' => [
                          'total' => $log->total(),
                          'per_page' => $log->perPage(),
                          'current_page' => $log->currentPage(),
                          'last_page' => $log->lastPage(),
                          'from' => $log->firstItem(),
                          'to' => $log->lastItem()
                      ],
                      'data' => $log
                  ];
        return $response;

        /*
        Se debe colocar en la clase Activity de la ruta use Spatie\Activitylog\Models\Activity
        el siguiente scope para el funcionamiento de la busqueda del log entre fechas

                     public function scopeBusqueda($query, $dato1="", $dato2="")
                     {

                        $resultado= $query->whereBetween('created_at', [$dato1->format('Y-m-d'), $dato2->format('Y-m-d')]);

                        return $resultado;

                        }
         */
   
    }

}
