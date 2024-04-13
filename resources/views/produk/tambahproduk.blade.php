
Tambah Post

@section('body')
<form action="{{route('produk.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Prodouk</label>
        <input type="text" class="form-control" name="namaproduk">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Harga</label>
        <input type="number" class="form-control" name="harga">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Diskon Produk</label>
        <input type="number" class="form-control" name="descproduk">
      </div>
      <div class="form-group">
        <label for="foto">Foto</label>
        <div class="input-group">
            <input type="file" class="form-control" id="foto" name="foto">
        </div>
    </div>
    
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
