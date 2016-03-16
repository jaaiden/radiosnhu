@extends('layouts.admin')

@section('content')

  <?php

  $dt = Carbon::now('America/New_York');
  $year = substr(strval($dt->year), 2);
  $season = "";
  if($dt->month >= 8 && $dt->month <= 12 && $dt->day <= 20)
  {
    $season = "FA";
  }elseif($dt->month >= 1 && $dt->month <= 4)
  {
    $season = "SP";
  }
  $cursemester = $year . $season . "DAY";

  ?>

  <div class="row-fluid">
    <div class="panel panel-default">
      <div class="panel-heading"><div class="panel-title">Radio Shows - {{ $cursemester }} <span class="pull-right"><a data-toggle="modal" data-target="#addShowModal" style="cursor:pointer;">Add New Show</a></div></div>
      <table class="panel-body table table-condensed table-striped table-hover">
        <th>Show Name</th>
        <th>Description</th>
        <th>Hosts</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Day</th>
        <th>Opt-in to <abbr title="Show of the Week">SOTW?</abbr></th>
        <th>Actions</th>

        <tbody>
          @foreach(Shows::all() as $show)
            <tr>
              <td><a href="#" id="showname" data-type="text" data-pk="{{ $show->id }}" data-url="/admin/shows/update" data-title="Show Name">{{ $show->showname or "Unnamed Show" }}</a></td>
              <td><a href="#" id="description" data-type="text" data-pk="{{ $show->id }}" data-url="/admin/shows/update" data-title="Show Description">{{ $show->description or "No description" }}</a></td>
              <td><a href="#" id="hosts" data-type="text" data-pk="{{ $show->id }}" data-url="/admin/shows/update" data-title="Hosts/DJs">{{ $show->hosts or "Nobody" }}</a></td>
              <td><a href="#" id="starttime" data-type="text" data-pk="{{ $show->id }}" data-url="/admin/shows/update" data-title="Start Time (24-hour format; HH:MM:SS)">{{ $show->starttime }}</a></td>
              <td><a href="#" id="endtime" data-type="text" data-pk="{{ $show->id }}" data-url="/admin/shows/update" data-title="End Time (24-hour format; HH:MM:SS)">{{ $show->endtime }}</a></td>
              <td><a href="#" id="showday" data-type="select" data-pk="{{ $show->id }}" data-url="/admin/shows/update" data-title="Show Day">{{ $show->showday }}</a></td>
              <td>
                <a href="#" id="optin_sotw" data-type="select" data-pk="{{ $show->id }}" data-url="/admin/shows/update" data-title="Allow Show of the Week?">
                  @if($show->optin_sotw)
                    <span class="text-success">Yes</span>
                  @else
                    No
                  @endif
                </a>
              </td>
              <td><a href="{{ URL::to('admin/shows/delete/' . $show->id) }}" class="text-danger">Delete</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div class="modal fade" id="addShowModal" tabindex="-1" role="dialog" aria-labelledby="addShowModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="addShowModal">Add New Show</h4>
        </div>
        <div class="modal-body">
          <form action="{{ URL::to('admin/shows/add') }}" method="post" class="form-horizontal">

            <div class="form-group">
              <label for="showname" class="col-sm-2 control-label">Show Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="showname" id="showname" placeholder="Name of the show">
              </div>
            </div>

            <div class="form-group">
              <label for="showdesc" class="col-sm-2 control-label">Show Description</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="description" id="showdesc" placeholder="Description of the show">
              </div>
            </div>

            <div class="form-group">
              <label for="hosts" class="col-sm-2 control-label">Show Hosts</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="hosts" id="hosts" placeholder="Description of the show">
              </div>
            </div>

            <div class="form-group">
              <label for="starttime" class="col-sm-2 control-label">Show Start Time</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="starttime" id="starttime" placeholder="Must be in 24-hour format and setup like: HH:MM:SS">
              </div>
            </div>

            <div class="form-group">
              <label for="endtime" class="col-sm-2 control-label">Show End Time</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="endtime" id="endtime" placeholder="Must be in 24-hour format and setup like: HH:MM:SS">
              </div>
            </div>

            <div class="form-group">
              <label for="showday" class="col-sm-2 control-label">Show Day</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="showday" id="showday" placeholder="Monday, Tuesday, etc">
              </div>
            </div>

            <div class="form-group">
              <div class="checkbox col-md-offset-2">
                <label>
                  <input type="checkbox" name="optin_sotw" value="1">
                  Opt-in to Show of the Week?
                </label>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-2">
                <button type="submit" class="btn btn-primary">Add Show</button>
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
      $('a[id^="showname"]').editable();
      $('a[id^="description"]').editable();
      $('a[id^="hosts"]').editable();
      $('a[id^="starttime"]').editable();
      $('a[id^="endtime"]').editable();
      $('a[id^="showday"]').editable({
        source: [
          {value: 'Monday', text: 'Monday'},
          {value: 'Tuesday', text: 'Tuesday'},
          {value: 'Wednesday', text: 'Wednesday'},
          {value: 'Thursday', text: 'Thursday'},
          {value: 'Friday', text: 'Friday'},
          {value: 'Saturday', text: 'Saturday'},
          {value: 'Sunday', text: 'Sunday'}
        ]
      });
      $('a[id^="optin_sotw"]').editable({
        source: [
          {value: 1, text: 'Yes'},
          {value: 0, text: 'No'}
        ]
      });
    });
  </script>

@stop