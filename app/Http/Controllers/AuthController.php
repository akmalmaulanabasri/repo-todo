<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('auth.index');
    }

    public function register(){
        return view('auth.register');
    }

    public function login(Request $request){
        $check = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($check)){
            $request->session()->regenerate();
            $request->session()->flash('success', 'Login successful!');
            return redirect()->route('dashboard');
        }

        return redirect()->route('login')->with('error-login', 'Invalid username or password!');
    }

    public function registerNew(Request $request){
        $register = $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'nama' => 'required',
            'password' => 'required'
        ]);

        $register['password'] = bcrypt($register['password']);
        
        User::create($register);

        return redirect()->route('login')->with('success-register', 'Berhasil mendaftar');

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
