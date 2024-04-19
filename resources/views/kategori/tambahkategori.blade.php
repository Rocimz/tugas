@extends('template')
<form action="{{route('kategori.store')}}" method="POST">
@csrf
<div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Nama Kategori</label>
      <input type="text" class="form-control" name="namakategori">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Diskon Kategori</label>
      <input type="number" class="form-control" name="desckategori">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Nama Produk</label>
      <select class="form-select form-select-sm" name="produk_id">
        @foreach ($data as $produk)
        <option value="{{$produk->id}}">{{$produk->namaproduk}}</option>
        @endforeach
      </select>
    </div>
  </div>
  
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>