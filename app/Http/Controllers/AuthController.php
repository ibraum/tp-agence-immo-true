<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return view('auth.login')->with('success', 'Vous êtes déconnecté ...');
    }

    public function doLogin(LoginRequest $request)
    {
        //dd($request->validated());
        $credentials = $request->validated();
        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended(route('welcome'));
        }
        return back()->withErrors([
            'email' => 'identifiants incorrectes ...',
        ])->onlyInput('email');
    }

}
