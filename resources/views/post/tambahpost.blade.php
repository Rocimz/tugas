@extends('template')
@section('body')
<form action="{{route('post.store')}}" method="POST">
@csrf
<h1>Tambah Postingan</h1>
<div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Judul</label>
      <input type="text" class="form-control" name="judul">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">isi</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Tanggal</label>
        <input type="date" class="form-control" name="tanggaldibuat">
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
  <br>
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
@endsection