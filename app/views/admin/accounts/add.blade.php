@extends('layouts.admin')

@section('content')
  <div class="well well-sm">
    <h4>Add a New User</h4>

    <form action="{{ URL::to('admin/accounts/add') }}" method="post" class="form-horizontal">
      
      <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-10">
          <input name="username" type="text" class="form-control" id="username" placeholder="Username">
        </div>
      </div>
      
      <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
          <input name="password" type="password" class="form-control" id="password" placeholder="••••••••">
        </div>
      </div>
      
      <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email Address</label>
        <div class="col-sm-10">
          <input name="email" type="text" class="form-control" id="email" placeholder="firstname.lastname@snhu.edu">
        </div>
      </div>
      
      <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">First Name</label>
        <div class="col-sm-10">
          <input name="firstname" type="text" class="form-control" id="firstname">
        </div>
      </div>
      
      <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">Last Name</label>
        <div class="col-sm-10">
          <input name="lastname" type="text" class="form-control" id="lastname">
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Create Account</button>
        </div>
      </div>
    </form>
  </div>
@stop