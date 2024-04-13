<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=produk::all();
        return view('produk/tampilproduk',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk/tambahproduk');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=$request->validate([
            'namaproduk'=>'required|string',
            'foto'=>'required|max:2000|mimes:png,jpg',
            'harga'=>'required|integer',
            'descproduk'=>'required|integer',
        ]);
        /*$foto = $request->file('foto');

        // Simpan foto ke dalam direktori
        $fotoPath = $foto->store('public/images');

        // Buat record produk dalam database
        $produk = new Produk();
        $produk->namaproduk = $validator['namaproduk'];
        $produk->harga = $validator['harga'];
        $produk->descproduk = $validator['descproduk'];
        $produk->foto = $fotoPath;
        $produk->save();*/
        $validator['foto']=$request->file('foto')->store('img');
        produk::create($validator);
        return redirect('produk');
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
        $data=produk::find($id);
        return view('produk/editproduk',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator=$request->validate([
            'namaproduk'=>'required|string',
            'harga'=>'required|integer',
            'descproduk'=>'required|integer',
        ]);
        $foto=produk::findOrFail($id);        
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika perlu
            // Storage::delete('path_to_your_photo_folder/' . $photo->filename);
    
            // Simpan foto baru
            $filename = $request->file('foto')->store('img');
    
            // Update nama file foto dalam database
            $foto->foto = $filename;
        }
    
        // Update atribut lainnya jika perlu
        // $photo->other_attribute = $request->other_attribute;
    
        $foto->save();
    
        produk::find($id)->update($validator);
        return redirect('produk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        produk::find($id)->delete($id);
        return redirect('produk');
    }
}
