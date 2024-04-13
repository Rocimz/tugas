@extends('template')
<h1>Kategori</h1>
<a href="{{route('produk.create')}}" class="btn btn-primary">Tambah Data</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Foto</th>
        <th scope="col">Harga</th>
        <th scope="col">Diskon Produk</th>
        <th scope="col">Action</th>
      </tr>
    </thead>    
    <tbody>
        @foreach ($data as $item)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$item->namaproduk}}</td> 
        <td><img src="{{ asset('storage/' . $item->foto) }}" width="5%"></td>
        <td>{{$item->harga}}</td>
        <td>{{$item->descproduk}}</td>
        <td class="no-wrap-text"> 
          <div class="btn-group" role="group" aria-label="Basic example">
              <a href="{{route('produk.edit',$item->id)}}" class="btn btn-warning">Edit</a>&nbsp&nbsp
              <form action="{{route('produk.destroy',$item->id)}}" method="POST">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
          </div>
      </td>
      </tr> 
      @endforeach     
    </tbody>
  </table>
