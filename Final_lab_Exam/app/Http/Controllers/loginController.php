<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class loginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function verify(Request $req){

     
        $user  = User::where('username', $req->username)
                        ->where('password', $req->password)
                        ->first();



        if(count((array)$user) > 0){

            $req->session()->put('username', $req->username);
            $req->session()->put('type', $req->username);
            
            return redirect('home.index');
        }else{
            $req->session()->flash('msg', 'invalid username/password');
            return redirect('/portal/login');
        }
    }
}
