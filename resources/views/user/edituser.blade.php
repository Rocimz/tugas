@extends('template')
@section('body')
<form action="{{route('user.update',$data->id)}}" method="POST">
@csrf
@method('PUT')
<div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Nama</label>
      <input type="text" class="form-control" name="name" value="{{$data->name}}">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="email" class="form-control" name="email" value="{{$data->email}}">
    </div>
      <div class="form-group">
        <label for="exampleInputEmail1">password</label>
        <input type="password" class="form-control" name="password" value="">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">role</label>
        <select class="form-select form-select-sm" name="role">
          
          <option value="Admin" @if($role->role == 'Admin') selected @endif>Admin</option>
          <option value="Editor" @if($role->role == 'Editor') selected @endif>Editor</option>
          <option value="User" @if($role->role == 'User') selected @endif>User</option>
          
        </select>
      </div>
  </div>
  
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
@endsection