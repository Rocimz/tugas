<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;

class kategoricontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=kategori::all();
        return view('kategori/tampilkategori',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=produk::all();
        return view('kategori/tambahkategori',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid=$request->validate([
            'namakategori'=>'string|required',
            'desckategori'=>'required|string',
            'produk_id'=>'required'
        ]);
        kategori::create($valid);
        return redirect('kategori');
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
        $data=kategori::find($id);
        $data2=produk::all();
        return view('kategori/editkategori',compact('data','data2'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $valid=$request->validate([
            'namakategori'=>'string|required',
            'desckategori'=>'required|string',
            'produk_id'=>'required'
        ]);
        kategori::find($id)->update($valid);
        return redirect('kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        kategori::find($id)->delete($id);
        return redirect('kategori');
    }
}
