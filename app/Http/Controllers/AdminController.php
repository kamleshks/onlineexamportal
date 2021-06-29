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
    
    
}
