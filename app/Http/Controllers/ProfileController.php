<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('admin.profile.index',compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ],[
            'old_password.required' => 'Password lama harus dimasukkan!!',
            'password.required' => 'Password baru harus diisi!!',
            'password.confirmed' => 'Konfirmasi Password tidak sama!!',
            'password.min' => 'Password minimal 6 karakter!!'
        ]);

        if(!Hash::check($request->old_password,auth()->user()->password)){
            return redirect()->route('profile')->withErrors(['old_password' => 'Password lama salah!!']);
        }

        $user = User::findOrFail(auth()->user()->id);
        $user->update(['password'=>$request->password]);
        return redirect()->route('profile')->with('success','Berhasil ubah password!!');
    }
}
