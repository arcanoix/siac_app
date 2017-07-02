<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;

class BusinessController extends Controller
{
    //

    public function index()
    {
     	$business = Business::all();

     	return response()->json([
     			'business' => $business
     		]);
    }

	public function store()
	{

	}


}
