<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'address' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->role = "user";
        $user->save();
        return redirect('/login')->with('regist', 'Success register, please login with your account');
    }

    public function authLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password],$request->remember)) {
            
            return redirect()->intended('/');
        }else{
            return redirect('/login')->with('failed', 'Invalid Credentials');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        
        return redirect('/');
    }
}
