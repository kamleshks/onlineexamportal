<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\VerifyUser;
use Auth;
use DB;
use App\Mail\Activate;
use App\Mail\Deactivate;


class VerifyUserController extends Controller
{

public function activeUser(Request $request)
    {
        $id = $request['id'];


        $user =  User::where('id',$id)->first(); 
         
        
        if ($user->user_status == 2)
        {

            $data=config('userstatus.activate');
            //dd($data);
           $user->user_status = $data;
            //dd($user->user_status);
            $user->save();
        // dd($user->email);
        \Mail::to($user->email)->send(new activate($user));

         return response()->json(['message'=>'Activate succesfully']); 

        }
       
      
       }
       public function deactiveUser(Request $request)
    {
        $id = $request['id'];


        $user =  User::where('id',$id)->first(); 
         
        
        if ($user->user_status == 1)
        {

            $data=config('userstatus.deactivate');
            
           $user->user_status = $data;
            //dd($user->user_status);
            $user->save();
        // dd($user->email);
        \Mail::to($user->email)->send(new Deactivate($user));

         return response()->json(['message'=>'Deactivate succesfully']); 

        }
       
      
       }
}