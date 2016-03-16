<script type="text/javascript">
  var audio;

  $(document).ready(function(){
    audio = $("#audiostream");
    $("#pause").hide();

    updateShowInfo();

    setInterval(function() {
      updateShowInfo();
    }, 5000);

    updateSongInfo();

    setInterval(function() {
      updateSongInfo();
    }, 5000);

    if ( ($(window).height() + 100) < $(document).height() ) {
      $('#top-link-block').removeClass("hidden").affix({
        // how far to scroll down before link "slides" into view
        offset: {top:100}
      });
    }
  });

  function updateShowInfo()
  {
    $.post('getshowinfo',
    function(output) {
      $("#currentshow").text(output);
    });
  }

  function updateSongInfo()
  {
    $.post('getsonginfo',
    function(output) {
      $("#songinfo").text(output);
    });
  }

  function playAudio(){
    audio.trigger('play');
    $("#play").hide();
    $("#pause").show();
  }

  function pauseAudio(){
    audio.trigger('pause');
    $("#pause").hide();
    $("#play").show();
  }

  function volumeUp(){
    var volume = audio.prop("volume")+0.1;
    if(volume >1){
        volume = 1;
    }
    audio.prop("volume",volume);
  }

  function volumeDown(){
    var volume = audio.prop("volume")-0.1;
    if(volume <0){
        volume = 0;
    }
    audio.prop("volume",volume);
  }

  function toggleMute(){
    $("#pause").hide();
    $("#play").show();
    audio.prop("muted",!audio.prop("muted"));
  }

  $(function() {
    $('a[href*=#]:not([href=#])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
  });
  
  $(function() {
    $('button.accordion-toggle').on('click', function () {
      $('button.accordion-toggle').removeClass('active');
      $(this).addClass('active');
    });
  });
</script>