<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
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
}
