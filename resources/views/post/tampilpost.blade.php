@extends('template')
@section('body')
<h1>Postingan</h1>
<a href="{{route('post.create')}}" class="btn btn-primary">Tambah Data</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Judul</th>
        <th scope="col">Isi</th>
        <th scope="col">Tanggal Dibuat</th>
        <th scope="col">Action</th>
      </tr>
    </thead>    
    <tbody>
        @foreach ($data as $item)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$item->judul}}</td> 
        <td>{{$item->isi}}</td>
        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->tanggaldibuat)->format('d F Y') }}</td>
        <td>{{$item->produk->namaproduk}}</td>
        <td class="no-wrap-text"> 
          <div class="btn-group" role="group" aria-label="Basic example">
              <a href="{{route('post.edit',$item->id)}}" class="btn btn-warning">Edit</a>&nbsp&nbsp
              <form action="{{route('post.destroy',$item->id)}}" method="POST">
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
@endsection