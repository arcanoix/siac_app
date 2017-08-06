<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Falla;
use App\Ads;
use App\Clientes;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = User::all()->count();
        $falla = Falla::all()->count();
        $cliente = Clientes::all()->count();
        $ads = Ads::all()->count();

        return response()->json([
          'user' => $user,
          'falla' => $falla,
          'cliente' => $cliente,
          'ads' => $ads
        ]);
    }
}
