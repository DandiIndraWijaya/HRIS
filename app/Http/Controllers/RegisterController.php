<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;

class RegisterController extends Controller
{
    public function register(Request $request){
        User::create([
            'username' => 'Dandi',
            'fullname' => $request->input('fullname'),
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s'),
            'password' => Hash::make($request->input('password')),
        ]);
        
        Session::flash('sukses', 'Berhasil Mendaftar');
        return redirect()->route('welcome');
    }
}
