<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;
use App\VerifyUser;
use App\Mail\VerifyMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Str;
use\Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
   // protected $redirectTo = RouteServiceProvider::adminlte;


   protected $redirectTo = '/welcomemail';

   
  


    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        //$this->middleware('guest');
    }(/)

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role'=>['required','string'],
            'gender'=>['required','string'],
            'dob'=>['sometimes'],
            'profile_picture'=>['sometimes', 'image','mimes:jpg,jpeg,bmp,svg,png'],
            'user_status'=>['sometimes'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      
       if(request()->hasFile('profile_picture')){

        $profile= request()->file('profile_picture');
        $filename=time().'.'.$profile->getClientOriginalExtension();
        $file_path=public_path('/Uploads/');
        $profile->move($file_path,$filename);
       
        $value=config('userstatus.deactivate');

        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'gender'=>$data['gender'],
            'dob' => $data['dob'],
            'profile_picture'=> $filename,
            'user_status'=> $value,
            
        ]);

    
            return redirect('/login');
       }


        else{

          $value=config('userstatus.deactivate');
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'gender'=>$data['gender'],
            'dob' => $data['dob'],
            'user_status'=> $value,
            
        ]);
          return redirect('/login');      }
       
}



public function registerusers(Request $request)
{




  if(request()->hasFile('profile_picture')){

    $profile= request()->file('profile_picture');
    $filename=time().'.'.$profile->getClientOriginalExtension();
    $file_path=public_path('/Uploads/');
    $profile->move($file_path,$filename);
   
    $value=config('userstatus.deactivate');
    $user= User::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
        'role' => $request['role'],
        'gender'=>$request['gender'],
        'dob' => $request['dob'],
        //'user_status'=>$request['value'],
       'profile_picture'=> $filename,
        'user_status'=> $value,
        
    ]);

   
   return redirect('/login');
}


    else{
        $role=$request['role'];
        if($role==2)
      {
      $value=config('userstatus.deactivate');
       $user= User::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
        'role' => $request['role'],
        'gender'=>$request['gender'],
        'dob' => $request['dob'],
        'user_status'=> $value,
        
    ]);
   }
   else{
    $value=config('userstatus.studentactive');
       $user= User::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
        'role' => $request['role'],
        'gender'=>$request['gender'],
        'dob' => $request['dob'],
        'user_status'=> $value,
         ]);
      }
    return redirect('/login');
  

}
}

}
