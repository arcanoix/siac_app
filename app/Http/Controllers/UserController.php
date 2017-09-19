<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;
use Intervention\Image\ImageManagerStatic as Image;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;
use Activity;


class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::with('roles')->paginate(5);
        $role = Role::all();

/*
    return response()->json([
        'users' => $users,
        'role' => $role
      ]);*/

      $response = [
       'pagination' => [
           'total' => $users->total(),
           'per_page' => $users->perPage(),
           'current_page' => $users->currentPage(),
           'last_page' => $users->lastPage(),
           'from' => $users->firstItem(),
           'to' => $users->lastItem()
       ],
       'data' => $users,
       'role' => $role
   ];

   return $response;


    }

    public function getTecnicos(){

     $users = DB::table('role_user')
     ->join('users','role_user.user_id','=','users.id')
     ->join('roles','role_user.role_id','=','roles.id')
     ->where('roles.name','Tecnico')

     ->get();

      return $users;
    }

    public function store(Request $request)
    {
    		$user = new User();
    		$user->nombre = $request->nombre;
    		$user->email = $request->email;
    		$user->password = bcrypt($request->pass);
        $user->status = $request->status;

        Activity::log('Ha registrado un usuario');

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
                  $find_user->nombre = $request->nombre;
                  $find_user->email = $request->email;
                  $find_user->status = $request->status;

                  if(is_null($request->pass)){
                    $find_user->password;
                  }else{
                    $find_user->password = $request->pass;
                  }

                  if($request->input('role_id') == null)
                  {
                  //  dd($find_user->role_id);
                    $find_user->role_id;

                  }else{
                    $role_id = $request->input('role_id');
                    $find_user->roles()->detach();
                    $find_user->roles()->attach(($role_id));
                  }
                  $imageData = $request->avatar;

                //  dd($imageData);
                                     if(is_null($request->avatar)){
                                       $find_user->avatar = $find_user->avatar;
                                     }
                                     else
                                     {
                                       $avatar_name = strtolower($find_user->nombre) . '_' . strtolower($find_user->email) . '_' . 'avatar.jpg';

                                       $avatar =  Image::make($request->avatar)->save(public_path('uploads/').$avatar_name);
                                       $find_user->avatar = $avatar_name;
                                     }


                              //dd($find_user);
                              Activity::log('Ha actualizado un usuario');

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
