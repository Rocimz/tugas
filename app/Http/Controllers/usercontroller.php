<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=User::all();
        return view('user/tampiluser',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user/tambahuser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid=$request->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string|min:8',
            'role'=>'required|string',
        ]);
        
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
        ]);
        return redirect('user');
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
    public function edit(string $id)
    {
        $data=user::find($id);
        $role=$data;
        $hashedPassword = $data->password;

        // Menampilkan kata sandi yang di-hash (hanya untuk keperluan debug)
        return view('user/edituser',compact('data','role','hashedPassword'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $valid=$request->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string|min:8',
            'role'=>'required|string',
        ]);
        
        User::find($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
        ]);
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete($id);
        return redirect('user');
    }
}
