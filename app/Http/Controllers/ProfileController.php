<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;
class ProfileController extends Controller
{
    public function index(){
        if (auth()->user()->role == 1 ){
            return view('admin.profile.viewProfile',[
                'title' => 'Edit Profile'
            ]);
        }else{
            return view('bph.profile.viewProfile',[
                'title' => 'Edit Profile'
            ]);
        }

    }

    public function updateProfile(Request $request){
        $id = auth()->user()->id;
        $user = User::findOrFail($id);
        $data = $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'Nama Wajib Diisi'
        ]);
        $user->update($data);
        return redirect()->back()->withToastSuccess('Admin Berhasil Diupdate');
    }

    public function updatePassword(Request $request){
        $id = auth()->user()->id;
        $user = User::findOrFail($id);
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ],[
            'password.required' => 'Password Wajib Diisi',
            'password_confirmation.required' => 'Password Konfirmasi Wajib Diisi'
        ]);
        $data = [
            'password' => bcrypt($request->password)
        ];
        $user->update($data);
        return redirect()->back()->withToastSuccess('Admin Berhasil Diupdate');

    }
}
