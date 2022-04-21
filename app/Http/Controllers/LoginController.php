<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title'     => "Login"
        ]);
    }
    public function register()
    {
        return view('login.register', [
            'title'     => "Register"
        ]);
    }
    public function store(Request $request)
    {
        $login = $request->validate([
            'name'      => 'required',
            'email'     => 'required|email:rfc|unique:users,email',
            'password'  => 'required|confirmed|min:6'
        ]);
        $login['password'] = Hash::make($request->input('password'));
        User::create($login);
        return redirect('/auth/login')->with('status', 'Berhasil Register, Silahkan Login !');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email"    => 'required|email:rfc',
            'password'  => 'required|min:6'
        ]);
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard/home')->with('status', 'Berhasil Login, Silahkan Ngeblog');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
