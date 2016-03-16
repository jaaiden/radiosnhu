<?php
function getSongInfo()
{
  /*

  Now Playing PHP script for SHOUTcast

  This script is (C) MixStream.net 2008

  Feel free to modify this free script
  in any other way to suit your needs.

  Version: v1.1

  */

  /* ----------- Server configuration ---------- */

  $ip = "63.138.247.24";
  $port = "8006";

  /* ----- No need to edit below this line ----- */
  /* ------------------------------------------- */
  $fp = @fsockopen($ip,$port,$errno,$errstr,1);
  if (!$fp)
  {
    return "Error: Connection to the server was refused."; // Diaplays when sever is offline
  }
  else
  {
    fputs($fp, "GET /7.html HTTP/1.0\r\nUser-Agent: Mozilla\r\n\r\n");
    while (!feof($fp))
    {
      $info = fgets($fp);
    }
    $info = str_replace('</body></html>', "", $info);
    $split = explode(',', $info);
    if (empty($split[6]) )
    {
      return "Media information is not currently available."; // Diaplays when sever is online but no song title
    }
    else
    {
      $title = str_replace('\'', '`', $split[6]);
      $title = str_replace(',', ' ', $title);
      return 'Now Playing: ' . $title; // Diaplays song
    }
  }
}


echo getSongInfo();
?>
