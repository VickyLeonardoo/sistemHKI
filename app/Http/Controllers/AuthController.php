<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    //

    public function prosesLogin(Request $request){
        request()->validate([
            'email' => 'required',
            'password' => 'required', ]
        );

        $kredensil = $request->only('email','password');
        if (Auth::guard('user')->attempt($kredensil)) {
            $user = Auth::guard('user')->user();
            if ($user->role == '1') {
                return redirect()->intended('home');
            }
        }elseif (Auth::guard('bph')->attempt($kredensil)) {
            $user = Auth::guard('bph')->user();
            if($user->role == 1){
                return redirect()->intended('bph');
            }
        }
        return redirect()->back()->withToastError('Login Gagal, Email atau Password Kamu Salah!');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/login');
    }
}
