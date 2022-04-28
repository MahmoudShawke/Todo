<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;



class userController extends Controller
{
    function __construct()
    {
        
    }

    function index(){
        
       
    }

    function login(){
        if(session('id')){
            return view('Tasks.index');
        }else{
            return view('Users.Login');
        }
       

    }

    function create(){

        return view('Users.Create');
    }

    function store(Request $request)
    {
        $data=$this->validate($request,[
            "name"     => 'required',
            "password" => "required|min:6|max:10",
            "email"    => "required|email|unique:users",

        ]);
        $data['password']=bcrypt($data['password']);

        $op =  User::create($data);



    }


    function dologin(Request $request){
        // code ....
    
         $data = $this->validate($request, [
               "email"    => "required|email",
               "password" => "required|min:6|max:10"
         ]);
    
         
         
         
           if(auth()->attempt($data)){
            $id = auth()->user()->ID;
            
            session()->put('id', $id);
          
            session()->flash('Message','Done');

          return redirect(url('/task')) ;
    
           }else{
    
            echo"eroror";
    
           }
    
    }
    function logout(){

        auth()->logout();
        session()->forget('id');
        return redirect(url('/user'));
        
  
      }
}
