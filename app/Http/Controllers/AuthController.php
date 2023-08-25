<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function prosesLogin(Request $request){
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $kredensil = $request->only('email','password');
        if (Auth::guard('user')->attempt($kredensil)) {
            $user = Auth::guard('user')->user();
            if ($user->role == '1') {
                return redirect()->intended('home')->withToastSuccess('Kamu Berhasil Masuk!');
            }else if($user->role == '2'){
                return redirect()->intended('bph')->withToastSuccess('Kamu Berhasil Masuk!');
            }
        }
        return redirect()->back()->withToastError('Login Gagal, Email atau Password Kamu Salah!');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/login')->withToastSuccess('Anda Berhasil Keluar!');
    }
}
