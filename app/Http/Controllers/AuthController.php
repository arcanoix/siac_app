<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Carbon\Carbon;
class AuthController extends Controller
{
	
	public function register(Request $request)
	{

	}
	/**
	 * signin function
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function signin(Request $request)
	{

	}
}
