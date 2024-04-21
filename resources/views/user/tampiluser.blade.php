@extends('template')
@section('body')
<h1>User</h1>
<a href="{{route('user.create')}}" class="btn btn-primary">Tambah Data</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">nama</th>
        <th scope="col">email</th>
        <th scope="col">role</th>
        <th scope="col">Action</th>
      </tr>
    </thead>    
    <tbody>
        @foreach ($data as $item)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$item->name}}</td> 
        <td>{{$item->email}}</td>
        <td>{{$item->role}}</td>
        <td class="no-wrap-text"> 
          <div class="btn-group" role="group" aria-label="Basic example">
              <a href="{{route('user.edit',$item->id)}}" class="btn btn-warning">Edit</a>&nbsp&nbsp
              <form action="{{route('user.destroy',$item->id)}}" method="POST">
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