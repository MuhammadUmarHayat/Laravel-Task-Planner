<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }
    public function registration(){
        return view("auth.registration");
    }
    public function registerUser(Request $request){


        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:12'
        ]);

    $user=new User();
    $user->name=$request->name;
    $user->email=$request->email;
    $user->password=Hash::make($request->password);
    $res=$user->save();
    if($res){
    return back()->with('success','You are registered successfully !');
    }else{
        return back()->with('fail','Something is wrong !');
    }


    }

    public function loginUser(Request $request){
        $request->validate([
           'email'=>'required|email',
            'password'=>'required|min:6|max:12'
        ]);
        $user=User::where('email','=',$request->email)->first();
        if( $user){
    if(Hash::check($request->password,$user->password)){
        $request->session()->put('loginId',$user->id);
        return redirect('dashboard');
    }else{
        return back()->with('fail','Password dosenot match');
    }
        }else{
            return back()->with('fail','This email is not registed !');
        }
    }

    public function dashboard(){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();

                }
              $name=  $data->name;
              $email=$data->email;
              session(['name' => $name]);// set session
              session(['email' => $email]);// set session
        return view("auth.dashboard",compact('data'));
    }
    public function logout(){
       if(Session::has('loginId')){
        Session::pull('loginId');
        return redirect('login');
       }
    }
    }
