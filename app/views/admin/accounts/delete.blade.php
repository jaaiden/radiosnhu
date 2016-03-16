@extends('layouts.admin')

@section('content')
  <div class="well well-sm">
    <h4>Delete User Account</h4>

    <p class="lead">Are you sure you want to delete the user account <kbd>{{ $email }}</kbd>?</p>
    <p class="text-danger">They will no longer be able to access the administration panel and you will need to re-add this user again in the future to allow access.</p>
    <br>
    @if(User::all()->count() == 1)
      <p class="text-danger"><strong>You cannot delete this account because it is the only one available. Please create a new account, then delete this one.</strong></p>
    @else
      <div class="btn btn-toolbar">
        <a href="{{ URL::to('admin/accounts/delete/' . $email . '/confirm') }}" class="btn btn-danger">Yes, I'm Sure</a>
        <a href="{{ URL::to('admin/accounts') }}" class="btn btn-default">No, Go Back</a>
      </div>
    @endif
  </div>
@stop