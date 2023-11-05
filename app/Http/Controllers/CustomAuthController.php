<?php

namespace App\Http\Controllers;
use App\Models\Aturan;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;


use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    public function index(){
        return view("auth.login");
    }

    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only("username","password");
        if(Auth::attempt($credentials)){
            return redirect()->intended("dashboard")->withSuccess("Berhasil Login");
        }
        return redirect()->back()->with('error',"Username atau password salah.");
}
    public function dashboard()
    {
        if(Auth::check()){
            $jumlahUser = User::count();
            $jumlahGejala = Gejala::count();
            $jumlahPenyakit = Penyakit::count();
            $jumlahAturan = Aturan::count();

            return view('dashboard', compact('jumlahUser', 'jumlahGejala', 'jumlahPenyakit', 'jumlahAturan'));
            
        }
  
        return redirect()->route('login.form')->with('error','You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return redirect()->route('login.form');
    }

    public function profile(){
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function ubahPassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Kata sandi saat ini tidak cocok.');
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Kata sandi berhasil diubah.');
    }
}
