@extends('template')
@section('body')
<form action="{{route('kategori.store')}}" method="POST">
@csrf
<h1>Tambah Kategori</h1>
<div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Nama Kategori</label>
      <input type="text" class="form-control" name="namakategori">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Diskon Kategori</label>
      <input type="number" class="form-control" name="desckategori">
    </div>
   
  </div>
  
  <!-- /.card-body -->
  <br>
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
@endsection