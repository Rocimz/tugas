<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class utamacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=produk::all();
        return view('index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produkshow=produk::with('kategori','post')->find($id);
        $produk=produk::all();
        $relevan = DB::table('produk')
    ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
    ->join('post', 'produk.id', '=', 'post.produk_id')
    ->where('produk.kategori_id', $id)
    ->get();



        
        return view('produk/tampildataperid',compact('produkshow','produk','kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
