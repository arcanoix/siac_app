<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();

    return response()->json([
        'users' => $users
        ]);
    

    }

    public function store(Request $request)
    {
    		$user = new User();
    		$user->name = $request->name;
    		$user->email = $request->email;
    		$user->password = $request->pass;
    		
    		

    		$user->save();

    		return response()->json([
    			'users' => $user ]);
    }


}
