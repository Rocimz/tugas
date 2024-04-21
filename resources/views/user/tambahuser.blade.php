@extends('template')
<form action="{{route('user.store')}}" method="POST">
@csrf
<div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">nama</label>
      <input type="text" class="form-control" name="name">
    </div>
    
      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" name="email">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">password</label>
        <input type="password" class="form-control" name="password">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">role</label>
        <select class="form-select form-select-sm" name="role">
          <option>Admin</option>
          <option>Editor</option>
          <option>User</option>
        </select>
      </div>
  </div>
  
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>