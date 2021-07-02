<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use DB;
use App\User;
use App\Teacherassign;
use App\Imports\Importquestion;
use App\Questionlist;
use Maatwebsite\Excel\Facades\Excel;
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
    public function __construct()
  {
     
      $this->middleware('auth');
  }

    public function Admin()
    {
     $actives= DB::table('users')
        ->select(
             DB::raw('IF((user_status = 1), count(id), Null) as active'),
            DB::raw('IF((user_status = 2), count(id), Null) as inactive'),
            
         )->groupBy('user_status',)->get();

          $roles= DB::table('users')
        ->select(
             DB::raw('IF((role = 2), count(id), Null) as teacher'),
            DB::raw('IF((role= 3), count(id), Null) as student'),
            
         )->groupBy('role',)->get();
             
          //dd($actives);   
             
          //dd($actives,$roles);   
        return view('Admin.home', compact('actives','roles'));
    }
    public function Teacher()
    {
   $actives= DB::table('users')
        ->select(
             DB::raw('IF((user_status = 1), count(id), Null) as active'),
            DB::raw('IF((user_status = 2), count(id), Null) as inactive'),
            
         )->groupBy('user_status',)->get();

          $roles= DB::table('users')
        ->select(
             DB::raw('IF((role = 2), count(id), Null) as teacher'),
            DB::raw('IF((role= 3), count(id), Null) as student'),
            
         )->groupBy('role',)->get();
             
          //dd($actives);   
             
          //dd($actives,$roles);   
        return view('Admin.teacher', compact('actives','roles'));
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
    public function import(Request $request)
    {
       
        $this->validate($request,
       [
       'file'=> 'required|mimes:xls,xlsx,csv'
       ]);
           Excel::import(new Importquestion,request()->file('file'));
                   return response()->json(["uploded sucessfully"]);
    }
    public function readQuestion(){

       $question= Questionlist::get();
        return response()->json($question);


    }
    public function getstudentname(){
         $user= User::Where('role',3)
              ->get();
               return response()->json($user);

    }
    public function insertquestion(Request $request){
       $response= $request->all();
       //dd($response);

            // $savearry = $request->question_id;
            
              $insertArray=[];
   
                foreach ($request->question_id as $key => $value) {
                   
                    $insertArray[$key]['student_id'] = $request->student_id;
                    $insertArray[$key]['question_id'] = $request->question_id;
                    
                }                
                dd($insertArray);
              // $insertquestions= implode(",",$insertArray);
   
            DB::table('teacherassigns')->insert($insertArray);









         // $teacherassign = new  Teacherassign();
         //  $teacherassign->student_id=$request->student_id;
         //  $teacherassign->question_id=$request->question_id;
         //  // print_r($teacherassign);
         //  // echo "<pre>";
         //  // die();
          //$teacherassign->save();
       
        return response()->json(["saved questions"]);
    }
    
    
}
