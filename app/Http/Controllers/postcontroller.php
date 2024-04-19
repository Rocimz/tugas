<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\produk;
use Illuminate\Http\Request;

class postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=post::all();
        return view('post/tampilpost',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=produk::all();
        return view('post/tambahpost',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid=$request->validate([
            'judul'=>'required|string',
            'isi'=>'required|string',
            'tanggaldibuat'=>'required|date',
            'produk_id'=>'required',
        ]);
        post::create($valid);
        return redirect('post');
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
        $data=post::find($id);
        $produk=produk::all();
        return view('post/editpost',compact('data','produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $valid=$request->validate([
            'judul'=>'required|string',
            'isi'=>'required|string',
            'tanggaldibuat'=>'required|date',
            'produk_id'=>'required',
        ]);
        post::find($id)->update($valid);
        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        post::find($id)->delete($id);
        return redirect('post');
    }
}
