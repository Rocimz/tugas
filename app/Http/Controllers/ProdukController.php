<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $kategori=kategori::all();
        return view('produk/tambahproduk',compact('kategori'));
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
            'kategori_id'=>'required',
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
        $produkshow=produk::with('post','kategori')->find($id);
        $produk=produk::all();
        $relevan = DB::table('produk')
    ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
    ->join('post', 'produk.id', '=', 'post.produk_id')
    ->where('produk.kategori_id', $id)
    ->get();


        
        return view('produk/tampildataperid',compact('produkshow','produk','relevan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=produk::find($id);
        $kategori=kategori::all();
        return view('produk/editproduk',compact('data','kategori'));
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
            'kategori_id'=>'required|integer'
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
