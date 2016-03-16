@extends('layouts.admin')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading"><div class="panel-title">Edit Content</div></div>
    <div class="panel-body">
      @include('admin.edit.links')
    </div>
  </div>

  <div class="row-fluid">
    
      <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading"><div class="panel-title">Event Details</div></div>
        <div class="panel-body">
          <form action="{{ URL::to('admin/edit/events/update') }}" method="post" class="form-horizontal">
            <div class="form-group">
              <label for="eventname" class="col-sm-2 control-label">Event Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="eventname" id="eventname" placeholder="Event Name" value="{{ Content::section('eventname')->content }}">
              </div>
            </div>
            <div class="form-group">
              <label for="eventdesc" class="col-sm-2 control-label">Event Description</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="eventdesc" id="eventdesc" placeholder="Event Description" rows="5">{{ Content::section('eventdesc')->content }}</textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="eventimg" class="col-sm-2 control-label">Event Image</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="eventimg" id="eventimg" placeholder="Link to Image" value="{{ Content::section('eventimg')->content }}">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-2">
                <button type="submit" class="btn btn-primary">Update Event Details</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading"><div class="panel-title">Event Preview</div></div>
        <div class="panel-body text-center">
          <h3>{{ Content::section('eventname')->content }}</h3>
          <br>
          {{ Content::section('eventdesc')->content }}
          <img src="{{ Content::section('eventimg')->content }}" class="img-thumbnail" width="50%">
        </div>
      </div>
    </div>

    </div>
  </div>

  <div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="addEventLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="addEvent">Add New Event</h4>
        </div>
        <div class="modal-body">
          <form action="{{ URL::to('admin/edit/events/add') }}" method="post" class="form-horizontal">
          
            <div class="form-group">
              <label for="prioritynum" class="col-sm-2 control-label">Priority</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="priority" id="priority" placeholder="A number, usually the last event priority #+1">
              </div>
            </div>
          
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Event Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="Name of the event">
              </div>
            </div>

            <div class="form-group">
              <label for="desc" class="col-sm-2 control-label">Event Description</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="desc" id="desc" placeholder="Description of the event">
              </div>
            </div>
            
            <div class="form-group">
              <label for="loc" class="col-sm-2 control-label">Event Location</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="loc" id="loc" placeholder="The event location, such as 'The Last Chapter Pub'">
              </div>
            </div>
            
            <div class="form-group">
              <label for="datetime" class="col-sm-2 control-label">Event Date/Time</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="datetime" id="datetime" placeholder="Example: December 2, 2015 @ 8pm">
              </div>
            </div>
            
            <div class="form-group">
              <label for="img" class="col-sm-2 control-label">Link to Event Image</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="img" id="img" placeholder="A link to the event's image (poster/flyer/etc). Grab it from Facebook or something.">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-2">
                <button type="submit" class="btn btn-primary">Add Event</button>
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
      $('a[id^="priority"]').editable();
      $('a[id^="name"]').editable();
      $('a[id^="eventdesc"]').editable();
      $('a[id^="eventloc"]').editable();
      $('a[id^="eventdatetime"]').editable();
      $('a[id^="imgloc"]').editable();
      
      $('#dtpicker').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:SS',
        icons: {
          time: "fa fa-clock-o",
          date: "fa fa-calendar",
          up: "fa fa-angle-up",
          down: "fa fa-angle-down"
        }
      });
    });
  </script>
  
  
  
  
  
  
  
  <!--
    
    New Setup
    
    <div class="panel panel-default">
        <div class="panel-heading"><div class="panel-title">RadioSNHU Events <span class="pull-right"><a data-toggle="modal" data-target="#addEvent" style="cursor:pointer;">Add New Event</a></div></div>
        <table class="panel-body table table-condensed table-striped table-bordered">
          <th>Event Priority</th>
          <th>Event Name</th>
          <th>Event Description</th>
          <th>Event Location</th>
          <th>Event Date/Time</th>
          <th>Event Image</th>
          <th>Actions</th>
          <tbody>
            @foreach(Events::all() as $event)
              <tr>
                <td><a href="#" id="priority" data-type="number" data-pk="{{ $event->id }}" data-url="/admin/edit/event/update" data-title="Set Event Priority">{{ $event->priority }}</a></td>
                <td><a href="#" id="name" data-type="text" data-pk="{{ $event->id }}" data-url="/admin/edit/event/update" data-title="Enter Event Name">{{ $event->name }}</a></td>
                <td><a href="#" id="eventdesc" data-type="text" data-pk="{{ $event->id }}" data-url="/admin/edit/event/update" data-title="Enter Event Description">{{ $event->eventdesc }}</a></td>
                <td><a href="#" id="eventloc" data-type="text" data-pk="{{ $event->id }}" data-url="/admin/edit/event/update" data-title="Enter Event Location">{{ $event->eventloc }}</a></td>
                <td><a href="#" id="eventdatetime" data-type="text" data-pk="{{ $event->id }}" data-url="/admin/edit/event/update" data-title="Enter Event Date/Time">{{ $event->eventdatetime }}</a></td>
                <td><a href="#" id="imgloc" data-type="text" data-pk="{{ $event->id }}" data-url="/admin/edit/event/update" data-title="Event Image">{{ $event->imgloc }}</a></td>
                <td><a href="{{ URL::to('admin/edit/event/delete/' . $event->id) }}" class="text-danger">Delete Event</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    
    
    
    
    
    Old Setup
    
    
    -->

@stop