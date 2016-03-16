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
      <div class="panel-heading"><div class="panel-title">Content</div></div>
      <div class="panel-body">
        <a href="#" id="content" data-type="textarea" data-pk="1" data-inputclass="input-large form-control col-md-12" data-url="/admin/edit/about/update" data-width="300px">{{{ Content::section('about')->content }}}</a>
      </div>
      <div class="panel-footer">
        Note: Use the <code>&lt;br&gt;</code> tag to insert a line break after each sentence in the text (you may exclude it after the last sentence).
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading"><div class="panel-title">Preview</div></div>
      <div class="panel-body">
        {{ Content::section('about')->content }}
      </div>
      <div class="panel-footer">
        After editing the top, reload the page to see the changes!
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function()
    {
      $.fn.editable.defaults.mode = 'inline';
      $('#content').editable({
        placeholder: 'Please enter something here!',
        rows: 20
      });
    });
  </script>
@stop