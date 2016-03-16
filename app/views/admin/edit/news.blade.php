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
    	<div class="panel-heading">Edit News</div>
    	<table class="table table-condensed">
    	  <thead>
    	    <th>Enable News</th>
    	    <th>News Title</th>
    	    <th>News Content</th>
    	  </thead>
    	  <tbody>
    	    <tr>
    	      <td><a href="#" id="content" data-type="select" data-pk="5" data-url="/admin/edit/news/update" data-title="Enable news?"></a></td>
    	      <td><a href="#" id="content" data-type="text" data-pk="6" data-url="/admin/edit/news/update" data-title="News title">{{ Content::where('section', 'notificationTitle')->first()->content }}</a></td>
    	      <td><a href="#" id="content" data-type="text" data-pk="7" data-url="/admin/edit/news/update" data-title="News content">{{ Content::where('section', 'notificationContent')->first()->content }}</a></td>
    	    </tr>
    	  </tbody>
    	</table>
    </div>
  </div>

  <script>
    $(document).ready(function()
    {
      $.fn.editable.defaults.mode = 'inline';
      $('a[id^="content"]:not([data-pk="5"])').editable();
      $('a[id^="content"][data-pk="5"]').editable({
        value: "{{ Content::where('section', 'hasNotification')->first()->content }}",
        source: [
          {"yes": 'Yes'},
          {"no": 'No'}
        ]
      });
    });
  </script>
@stop