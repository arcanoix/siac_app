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

    public function destroy($id)
    {
        if($find_user = User::find($id)){
          $find_user->delete();
          return response()->json([
            'success' => "eliminado"
          ]);
        }else{
          return response()->json([
            'error' => 'error al eliminar'
          ]);
        }
    }

    public function update(Request $request, $id)
    {
      $find_user = User::find($id);
      dd($find_user);
    }

    public function show($id){
      if($find_user = User::find($id)){
        return $find_user;
      }else{
        return response()->json(['error' => 'Error no se encuentra el registro']);
      }



    }


}
