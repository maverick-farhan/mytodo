<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function todo(){
    return view('welcome');
    }
    public function login(){
    return view('login');
    }

    public function entering(Request $request){
        $credentials = $request->validate([
            'passphrase'=>'required|min:8|',
            'password'=>'required|min:8|',
        ]);
        if(Auth::attempt($credentials)){
            return redirect()->route('todo');
        }
        else{
            return redirect()->route('login')->with('status',"Login credentials does'nt match our record");
        }

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
