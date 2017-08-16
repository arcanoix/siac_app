<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Role;


class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::with('roles')->get();
        $role = Role::all();       

    return response()->json([
        'users' => $users,
        'role' => $role
        ]);


    }

    public function store(Request $request)
    {
    		$user = new User();
    		$user->name = $request->name;
    		$user->email = $request->email;
    		$user->password = bcrypt($request->pass);
        $user->status = $request->status;

    		$user->save();
        $user->roles()->attach((2));

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
       //dd($request->pass);
        
       if($find_user = User::find($id)){
         
           
            //
                  $find_user->name = $request->name;
                  $find_user->email = $request->email;
                  $find_user->status = $request->status;
                  $find_user->roles()->detach();

                  if(is_null($request->pass)){
                    $find_user->password;
                  }else{
                    $find_user->password = $request->pass;
                  }
                  $role_id = $request->input('role_id');
                  $find_user->roles()->attach(($role_id));
                             
                              //dd($find_user->status , $role_id);
                $find_user->save();
          
            return $find_user;
        }else{
          return response()->json(['error' => 'Error al actualizar']);
        }
    }

    public function show($id){
      if($find_user = User::find($id)){
        return $find_user;
      }else{
        return response()->json(['error' => 'Error no se encuentra el registro']);
      }



    }


}
