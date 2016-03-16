@extends('layouts.admin')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="panel-title">User Accounts <span class="pull-right"><a href="{{ URL::to('admin/accounts/add') }}">Add New User</a></span></div>
    </div>
    
    <table class="panel-body table table-condensed table-striped table-hover">
      <th>Username</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Actions</th>
      <tbody>
        @foreach(User::all() as $acc)
          <tr>
            <td><a href="#" id="username" data-type="text" data-pk="{{ $acc->id }}" data-url="/admin/accounts/update" data-title="Username">{{ $acc->username }}</a></td>
            <td><a href="#" id="firstname" data-type="text" data-pk="{{ $acc->id }}" data-url="/admin/accounts/update" data-title="First Name">{{ $acc->firstname }}</a></td>
            <td><a href="#" id="lastname" data-type="text" data-pk="{{ $acc->id }}" data-url="/admin/accounts/update" data-title="Last Name">{{ $acc->lastname }}</a></td>
            <td><a href="#" id="email" data-type="text" data-pk="{{ $acc->id }}" data-url="/admin/accounts/update" data-title="Email Address">{{ $acc->email }}</a></td>
            <td><a href="{{ URL::to('admin/accounts/delete/' . $acc->username) }}" class="text-danger" title="Delete User"><i class="fa fa-times"></i> <i class="fa fa-user"></i></a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  
  <script type="text/javascript">
    $(document).ready(function()
    {
      $.fn.editable.defaults.mode = 'inline';
      $('a[id^="username"]').editable();
      $('a[id^="firstname"]').editable();
      $('a[id^="lastname"]').editable();
      $('a[id^="email"]').editable();
    });
  </script>
@stop