<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    public function index(){
        //return view('admin.login');
    }

    function loginView(){
        return view('admin.login');
    }

    function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');

        if (Auth::attempt(['email' => $email, 'password' => $password,'admin'=>'1', 'enabled'=>'1'], $remember)) {
            // Authentication passed...
            Auth::login(Auth::user(), $remember);
            return redirect()->route('admin-logout');
        }else{//('message', 'Login Failed')

            return redirect()->route('admin-login')->withErrors($request->all(), "message")->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect()->route('admin-login');
    }
}