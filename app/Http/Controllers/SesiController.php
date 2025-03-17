<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => ' Username Wajib Diisi',
                'password.required' => ' Password Wajib Diisi'
            ]
        );


        if (Auth::attempt($request->only('username', 'password'), $request->remember)) {
            if (Auth::user()->role_id == '4') return redirect()->route('home');
            $request->session()->regenerate();
            return redirect()->route('home');
        } else {
            return redirect('login')->withErrors('Username atau passowrd salah')->withInput();
        }
    }
    public function logout(Request $request)
    {
        Auth::logout(Auth::user());
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
