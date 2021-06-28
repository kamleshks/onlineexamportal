<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
class RoleController extends Controller
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
    public function readRole()
    {
        $data= DB::table('role_wise_user')->where('role_id', 2)->select('role_name')->pluck('role_name');
        dd($data);
        return response()->json($data);
    }
    
    
}
