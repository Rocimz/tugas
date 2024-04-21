@extends('template')
<form action="{{route('kategori.update',$data->id)}}" method="POST">
@csrf
@method('PUT')
<div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Nama Kategori</label>
      <input type="text" class="form-control" name="namakategori" value="{{$data->namakategori}}">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Diskon Kategori</label>
      <input type="number" class="form-control" name="desckategori" value="{{$data->desckategori}}">
    </div>
  </div>
  
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>