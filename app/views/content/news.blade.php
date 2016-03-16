@extends('layouts.frameview')

@section('framecontent')

<h3 class="page-header">News</h3>

<div id="rss-styled" style="display:none;"></div>

<script type="text/javascript">
  $("#rss-styled").rss("http://www.snhu.edu/rss_news.xml", {
      limit: 5,
      layoutTemplate: '<div class="panel panel-primary"><div class="panel-heading"><div class="panel-title"><span class="fa fa-rss"></span> Latest News</div></div><div class="panel-body"><table class="table table-condensed table-striped">{entries}</table></div></div>',
      entryTemplate: '<tr><td><a href="//www.snhu.edu{url}" target="_blank">{title}</a></td><td> {shortBodyPlain}</td></tr>'
  }).show();
</script>

@stop