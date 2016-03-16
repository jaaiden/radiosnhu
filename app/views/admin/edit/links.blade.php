<div class="btn-group btn-group-justified" role="group" aria-label="...">
  <a href="{{ URL::to('admin/edit/about') }}" class="btn btn-{{ Request::path() == 'admin/edit/about' ? 'primary' : 'default' }}" role="button">About</a>
  <a href="{{ URL::to('admin/edit/news') }}" class="btn btn-{{ Request::path() == 'admin/edit/news' ? 'primary' : 'default' }}" role="button">News</a>
  <a href="{{ URL::to('admin/edit/events') }}" class="btn btn-{{ Request::path() == 'admin/edit/events' ? 'primary' : 'default' }}" role="button">Events</a>
  <a href="{{ URL::to('admin/edit/alumni') }}" class="btn btn-{{ Request::path() == 'admin/edit/alumni' ? 'primary' : 'default' }}" role="button">Alumni</a>
  <a href="{{ URL::to('admin/edit/contact') }}" class="btn btn-{{ Request::path() == 'admin/edit/contact' ? 'primary' : 'default' }}" role="button">Contact</a>
</div>