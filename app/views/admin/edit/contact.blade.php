@extends('layouts.admin')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading"><div class="panel-title">Edit Content</div></div>
    <div class="panel-body">
      @include('admin.edit.links')
    </div>
  </div>

  <div class="row-fluid">
    
      <div class="panel panel-default">
        <div class="panel-heading"><div class="panel-title">RadioSNHU Contact List <span class="pull-right"><a data-toggle="modal" data-target="#addContactModal" style="cursor:pointer;">Add New Contact</a></div></div>
        <table class="panel-body table table-condensed table-striped">
          <th>Name</th>
          <th>Position</th>
          <th>Email Address</th>
          <th>Actions</th>
          <tbody>
            @foreach(Contact::all() as $contact)
              <tr>
                <td><a href="#" id="name" data-type="text" data-pk="{{ $contact->id }}" data-url="/admin/edit/contact/update" data-title="Enter Contact Name">{{ $contact->name }}</a></td>
                <td><a href="#" id="position" data-type="text" data-pk="{{ $contact->id }}" data-url="/admin/edit/contact/update" data-title="Enter Contact Position">{{ $contact->position }}</a></td>
                <td><a href="#" id="email" data-type="text" data-pk="{{ $contact->id }}" data-url="/admin/edit/contact/update" data-title="Enter Contact Email Address">{{ $contact->email }}</a></td>
                <td><a href="{{ URL::to('admin/edit/contact/delete/' . $contact->id) }}" class="text-danger">Delete</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>

  <div class="modal fade" id="addContactModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="addContactModal">Add New Contact</h4>
        </div>
        <div class="modal-body">
          <form action="{{ URL::to('admin/edit/contact/add') }}" method="post" class="form-horizontal">

            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Contact Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="First Last">
              </div>
            </div>

            <div class="form-group">
              <label for="position" class="col-sm-2 control-label">Contact Position</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="position" id="position" placeholder="Position">
              </div>
            </div>

            <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Contact Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="email" id="email" placeholder="firstname.lastname@snhu.edu">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-2">
                <button type="submit" class="btn btn-primary">Add Contact</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function()
    {
      $.fn.editable.defaults.mode = 'inline';
      $('a[id^="name"]').editable();
      $('a[id^="position"]').editable();
      $('a[id^="email"]').editable();
    });
  </script>

@stop