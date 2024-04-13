
Tambah Post

@section('body')
<form action="{{route('produk.update',$data->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Prodouk</label>
        <input type="text" class="form-control" name="namaproduk" value="{{$data->namaproduk}}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Harga</label>
        <input type="number" class="form-control" name="harga" value="{{$data->harga}}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Diskon Produk</label>
        <input type="number" class="form-control" name="descproduk" value="{{$data->descproduk}}">
      </div>
      <div class="form-group">
        <label for="foto">Foto</label>
        <div class="input-group">
          <img src="{{ asset('storage/' . $data->foto) }}" alt="Photo" width="20%"><br>
            <input type="file" class="form-control" id="foto" name="foto" value="{{$data->foto}}">
        </div>
    </div>
    
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
