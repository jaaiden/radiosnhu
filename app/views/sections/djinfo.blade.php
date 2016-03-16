<!-- <div class="media" id="djcontent">
  <a class="pull-left" onclick="showDJProfile('{{ $djinfo->name }}')" style="cursor:pointer;">
  	<img class="media-object img-circle" src="{{ $djinfo->profileimg }}" width="128" height="128" alt="DJ Profile">
  </a>
  <div class="media-body">
    <h3 class="media-heading" style="margin-top:30px;">{{ $djinfo->showname }}</h3>
    <a onclick="showDJProfile('{{ $djinfo->name }}')" style="cursor:pointer;"><span class="fa fa-user"></span> DJ Profile</a><br>
    <a href="https://twitter.com/{{ $djinfo->twitter }}" target="_blank"><span class="fa fa-twitter"></span> <span>@</span>{{ $djinfo->twitter }}</a>
  </div>
</div> -->

<!-- <div class="media" id="loading">
  <span class="fa fa-circle-o-notch fa-5x fa-spin pull-left"></span>
  <div class="media-body">
    <h4 class="media-heading">Loading...</h4>
  </div>
</div> -->

<script type="text/javascript">
  // (function($)
  // {
  //   $(document).ready(function()
  //   {
  //     $.ajaxSetup(
  //     {
  //       cache: false,
  //       beforeSend: function()
  //       {
  //         $('#djcontent').hide();
  //         $('#loading').show();
  //       },
  //       complete: function()
  //       {
  //         $('#loading').hide();
  //         $('#djcontent').show();
  //       },
  //       success: function()
  //       {
  //         $('#loading').hide();
  //         $('#djcontent').show();
  //       }
  //     });

  //     var $container = $('#djcontent');
  //     $container.load("{{-- route('GetDJInformation') --}}");
  //     var loadDJ = setInterval(function()
  //     {
  //       $container.load("{{-- route('GetDJInformation') --}}");
  //     }, 300);
  //   });
  // })(jQuery);
</script>

<script>
function showDJProfile(djname)
{
  $('#content').attr('src', '{{ URL::to("profiles/' + djname + '") }}');
}
</script>