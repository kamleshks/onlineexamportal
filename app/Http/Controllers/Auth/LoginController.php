<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use User;
use\Illuminate\Http\Request;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        //$this->middleware('prevent-back-history'); 
        //$this->middleware('auth');
    }

    protected function authenticated(Request $request,$user)
    {   
        
        
       
      /* if(Auth::check() &&  Auth::user()->user_status==1 )
        {
           
            
            return redirect('/admin');
           
        }
        
        Auth::logout();
        return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');*/


        if (Auth::check() && Auth::user()->role == 1) 
        {
          return redirect('/admin'); 
        }

        elseif (Auth::check() && Auth::user()->role == 2) 
        {
         return redirect('/teacher');
        }

      else
       {
        return redirect('/student');
       }
       
    }

    public function logout(Request $request) {
         Auth::logout();
        return redirect('/login');
     }
    /*public function logout(Request $request ) {
    $request->session()->flush();
    Auth::logout();
    return Redirect('/login');
    }*/
 
}
