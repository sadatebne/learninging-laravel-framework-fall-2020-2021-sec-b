<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\User;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index(){
    	return view('login.index');
    }
    public function verify(Request $req){
               
       

    	if(count((array)$user) > 0){
    		$req->session()->put('username', $req->username);
            $req->session()->put('type', $req->username);
            
    		return redirect()->route('home.index');
    	}else{
    		$req->session()->flash('msg', 'invalid username/password');
    		return redirect('/app/login');
    		//return view('login.index');
    	}
    }

}
