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
        <div class="panel-heading"><div class="panel-title">RadioSNHU Alumni <span class="pull-right"><a data-toggle="modal" data-target="#addAlumniModal" style="cursor:pointer;">Add New Alumni</a></div></div>
        <table class="panel-body table table-condensed table-striped">
          <th>Alumni Name</th>
          <th>Alumni Description</th>
          <th>Actions</th>
          <tbody>
            @foreach(Alumni::all() as $alumni)
              <tr>
                <td><a href="#" id="name" data-type="text" data-pk="{{ $alumni->id }}" data-url="/admin/edit/alumni/update" data-title="Enter Alumni Name">{{ $alumni->name }}</a></td>
                <td><a href="#" id="desc" data-type="text" data-pk="{{ $alumni->id }}" data-url="/admin/edit/alumni/update" data-title="Enter Alumni Description">{{ $alumni->description }}</a></td>
                <td><a href="{{ URL::to('admin/edit/alumni/delete/' . $alumni->id) }}" class="text-danger">Delete</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>

  <div class="modal fade" id="addAlumniModal" tabindex="-1" role="dialog" aria-labelledby="addAlumniModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="addAlumniModal">Add New Alumni</h4>
        </div>
        <div class="modal-body">
          <form action="{{ URL::to('admin/edit/alumni/add') }}" method="post" class="form-horizontal">

            <div class="form-group">
              <label for="alumniname" class="col-sm-2 control-label">Alumni Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="alumniname" placeholder="First Last">
              </div>
            </div>

            <div class="form-group">
              <label for="alumnidesc" class="col-sm-2 control-label">Alumni Description</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="desc" id="alumnidesc" placeholder="Position, Year">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-2">
                <button type="submit" class="btn btn-primary">Add Alumni</button>
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
      $('a[id^="desc"]').editable();
    });
  </script>

@stop