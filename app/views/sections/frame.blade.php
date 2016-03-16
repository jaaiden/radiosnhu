<script type="text/javascript">
  function iframeLoaded() {
    var iFrameID = document.getElementById('content');
    if(iFrameID) {            
      iFrameID.height = "";
      iFrameID.height = iFrameID.contentWindow.document.body.scrollHeight + "px";
    }   
  }
</script> 
<iframe onload="iframeLoaded()" id="content" src="{{ URL::to('about') }}" style="margin-top:-23px; width:100%;" seamless="seamless" frameborder="0" scrolling="0"></iframe>