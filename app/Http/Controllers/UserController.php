<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewUser(){
        $user = User::all();
        $title = 'View User';
        return view('admin.user.viewUser', compact('user','title'));
    }

    public function viewTambahData(){
        return view('admin.user.viewTambahUser',[
            'title' => "Tambah User",
        ]);
    }
}
