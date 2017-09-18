<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Falla;
use App\Clientes;
use App\User;

class PdfController extends Controller
{
    //

    public function fallas()
    {
          $fallas = Falla::all();
          $view =  \View::make('admin.reportes.falla', compact('fallas'))->render();
          $pdf = \App::make('dompdf.wrapper');
          $pdf->loadHTML($view)->setPaper('a4', 'landscape');

           return $pdf->stream();

    }

    public function cliente()
    {
          $clientes = Clientes::all();
          $view =  \View::make('admin.reportes.clientes', compact('clientes'))->render();
          $pdf = \App::make('dompdf.wrapper');
          $pdf->loadHTML($view)->setPaper('a4', 'landscape');

           return $pdf->stream();

    }


        public function usuario()
        {
              $usuarios = User::all();
              $view =  \View::make('admin.reportes.usuario', compact('usuarios'))->render();
              $pdf = \App::make('dompdf.wrapper');
              $pdf->loadHTML($view)->setPaper('a4', 'landscape');


               return $pdf->stream();


              //return $pdf->download('reporte-incidencias-'.date('Y-m-d').'.pdf');

        }
}
