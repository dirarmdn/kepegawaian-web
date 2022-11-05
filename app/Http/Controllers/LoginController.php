<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() {
        return view('login');
    }

    public function register() {
        return view('register');
    }

    public function logout() {

        Auth::logout();
        return redirect('/login');
    }

    public function registeruser(Request $request) {
        
        User::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)
        ]);

        return redirect('login');
    }

    public function loginuser(Request $request) {
        
        if(Auth::attempt($request->only('name','password'))){
            return redirect('/');
        }

        return redirect('/login');
    }
}
