<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view("user.index", compact("user"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("user.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'username' => 'required|unique:users',
                'password' => 'required|min:5',
            ]);
    
            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->password),
            ]);
    
            return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('user.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        try{



            $request->validate([
                'name' => 'required',
                'username' => 'required|unique:users,username,'.$id,
                'password' => 'nullable|min:6',
            ]);
    
            $user = User::findOrFail($id);
            $user->name = $request->name;

            

            $user->username = $request->username;
    
            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }
    
            $user->save();
    
            return redirect()->route('user.index')->with('success', 'Pengguna berhasil diperbarui.');
        }catch(\Exception $e){
            return redirect()->route('user.index')->with('error', $e->getMessage());
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::find($id);
        if(Auth::user()->name == $users->name){
            return redirect()->route('user.index')->with('error', "Tidak bisa menghapus akun sendiri.");
        }
        $users->delete();
        return redirect()->route("user.index")->with("success","User Berhasil di hapus");
    }

    public function ubahPassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('Kata sandi saat ini salah.');
                }
            }],
            'new_password' => 'required|min:8|different:current_password',
            'confirm_password' => 'required|same:new_password',
        ]);

        // Ubah kata sandi
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Redirect ke halaman profil
        return redirect()->route('profile')->with("success","Kata sandi berhasil diperbarui.");
    }

    public function ubahNama(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => ['required', function ($attribute, $value, $fail) {
                if ($value === Auth::user()->name) {
                    $fail('Nama baru tidak boleh sama dengan nama sebelumnya.');
                }
            }],
        ]);

        // Ubah nama pengguna
        $user = Auth::user();
        $user->name = $request->nama;
        $user->save();

        // Redirect ke halaman profil
        return redirect()->route('profile')->with('success','Nama berhasil diperbarui.');
    }



}
