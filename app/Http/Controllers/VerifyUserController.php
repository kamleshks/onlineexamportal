<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\VerifyUser;
use Auth;
use DB;
use App\Mail\Activate;


class VerifyUserController extends Controller
{



 public function activeUser(Request $request)
    {
        $id = $request['id'];
        $user =  User::where('id',$id)->first(); 
         
           dd($user);
        if ($user->user_status == 2)
        {

            $data = config('status.activate');
           $user->user_status = $data;

            $user->save();
        
        \Mail::to($user->email)->send(new activate( $user));
        
        

            return response()->json(['message'=>'Activate succesfully']); 

        }
       
      
       }
}