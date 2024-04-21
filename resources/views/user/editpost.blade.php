@extends('template')
<form action="{{route('post.update',$data->id)}}" method="POST">
@csrf
@method('PUT')
<div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Judul</label>
      <input type="text" class="form-control" name="judul" value="{{$data->judul}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">isi</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi">{{$data->isi}}</textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Tanggal</label>
        <input type="date" class="form-control" name="tanggaldibuat" value="{{$data->tanggaldibuat}}">
      </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Nama Produk</label>
      <select class="form-select form-select-sm" name="produk_id">
        @foreach ($produk as $produk)
        <option value="{{$produk->id}}" @selected($data->produk_id==$produk->id)>{{$produk->namaproduk}}</option>
        @endforeach
      </select>
    </div>
  </div>
  
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>