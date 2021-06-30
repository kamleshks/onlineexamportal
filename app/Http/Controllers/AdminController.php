<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function Admin()
    {
      $user= User::Where('role',1)
              ->get();
             
             
        return view('users.index', compact('user'));
    }
    public function Teacher()
    {
    $user= User::Where('role',2)
              ->get();
             
             
        return view('users.index', compact('user'));
    }
    }
    public function Student()
    {

        $user= User::Where('role',3)
              ->get();
             
             
        return view('users.index', compact('user'));
    }

    public function readAdminData()
    {
       // $data= User::where('role',2)->get();  
        //return response()->json($data);
         $users = User::select(
                             "users.id",
                            "users.name",
                            "users.email", 
                            "users.user_status",
                            "role_wise_user.role_name"
                        )
                        ->join("role_wise_user", "role_wise_user.role_id", "=", "users.role")->where("users.role",2)
                        ->get();

                        return response()->json($users);
                        //dd($users);
    }
     public function readStudentData()
    {
       // $data= User::where('role',2)->get();  
        //return response()->json($data);
         $users = User::select(
                             "users.id",
                            "users.name",
                            "users.email", 
                            "users.user_status",
                            "role_wise_user.role_name"
                        )
                        ->join("role_wise_user", "role_wise_user.role_id", "=", "users.role")->where("users.role",3)
                        ->get();

                        return response()->json($users);
                        //dd($users);
    }
    
    
}
