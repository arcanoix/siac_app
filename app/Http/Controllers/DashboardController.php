<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Falla;
use App\Ads;
use App\Clientes;
//use Mapper;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = User::all()->count();
        $falla = Falla::all()->count();
        $cliente = Clientes::all()->count();
        $ads = Ads::all()->count();

        // Show Map
       // Mapper::map(10.153395, -67.942244, ['eventBeforeLoad' => 'console.log("before load");']);

        return response()->json([
          'user' => $user,
          'falla' => $falla,
          'cliente' => $cliente,
          'ads' => $ads
        ]);
    }
}
