<?php 
/** 
 * 
 * @package:    shoutcast 
 * @version:    $Id: shoutcast.php 4 2011-12-02 17:27:36Z MADxHAWK $ 
 * @copyright:    (c) 2010 by Martin H. (madxhawk@radio-blackpearl.de) 
 * @licence:    ***91;url***93;http://opensource.org/licenses/gpl-license.php***91;/url***93; GNU Public License 
 * 
 */ 

// ---------------------------------------------------------------------------- 
// You need to change data to your specific use 
// ---------------------------------------------------------------------------- 
$useragent    = "Mozilla (DNAS 2 Statuscheck)"; 
$sc_host    = 's30.myradiostream.com';
$sc_port    = '17836'; 
$sc_user    = 'admin'; 
$sc_pass    = 'potato'; 
$sc_sid        = '1'; 


// ---------------------------------------------------------------------------- 
// DO NOT EDIT 
// ---------------------------------------------------------------------------- 

//init curl connection 
$ch = curl_init($sc_host . '/admin.cgi?mode=viewxml&sid=$sc_sid'); 

// set curl connection parameter 
curl_setopt($ch, CURLOPT_PORT, $sc_port); 
curl_setopt($ch, CURLOPT_USERAGENT, $useragent); 
curl_setopt($ch, CURLOPT_TIMEOUT, 5); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
curl_setopt($ch, CURLOPT_USERPWD, $sc_user . ':' . $sc_pass); 

// connect to shoutcastserver 
$curl = curl_exec($ch); 

// now get the xml data 
if ($curl) 
{ 
    $xml = @simplexml_load_string($curl); 

    $dnas_data = array ( 
        'CURRENTLISTENERS'    => (string)$xml->CURRENTLISTENERS, 
        'PEAKLISTENERS'        => (string)$xml->PEAKLISTENERS, 
        'MAXLISTENERS'        => (string)$xml->MAXLISTENERS, 
        'REPORTEDLISTENERS'    => (string)$xml->REPORTEDLISTENERS, 
        'AVERAGETIME'        => (string)$xml->AVERAGETIME, 
        'SERVERGENRE'        => (string)$xml->SERVERGENRE, 
        'SERVERURL'            => (string)$xml->SERVERURL, 
        'SERVERTITLE'        => (string)$xml->SERVERTITLE, 
        'SONGTITLE'            => (string)$xml->SONGTITLE, 
        'NEXTTITLE'            => (string)$xml->NEXTTITLE, 
        'SONGURL'            => (string)$xml->SONGURL, 
        'IRC'                => (string)$xml->IRC, 
        'ICQ'                => (string)$xml->ICQ, 
        'AIM'                => (string)$xml->AIM, 
        'STREAMHITS'        => (string)$xml->STREAMHITS, 
        'STREAMSTATUS'        => (string)$xml->STREAMSTATUS, 
        'BITRATE'            => (string)$xml->BITRATE, 
        'CONTENT'            => (string)$xml->CONTENT, 
        'VERSION'            => (string)$xml->VERSION, 
    ); 

    // Get Listeners and Songhistory 
    if ($dnas_data***91;'STREAMSTATUS'***93; == 1) 
    { 
        // store listener in array 
        foreach ($xml->LISTENERS->LISTENER as $listener) 
        { 
            $sc_data***91;'LISTENERS'***93;***91;***93; = array( 
                'HOSTNAME' => (string) $listener->HOSTNAME, 
                'USERAGENT' => (string) $listener->USERAGENT, 
                'CONNECTTIME' => (string) $listener->CONNECTTIME, 
                'POINTER' => (string) $listener->POINTER, 
                'UID' => (string) $listener->UID, 
            ); 
        } 

        // store songhistory in array 
        foreach ($xml->SONGHISTORY->SONG as $song) 
        { 
            $sc_data***91;'SONGHISTORY'***93;***91;***93; = array( 
                'PLAYEDAT' => (string) $song->PLAYEDAT, 
                'TITLE' => (string) $song->TITLE, 
            ); 
        } 
    } 
} 
else 
{ 
    $dnas_data = array('ERROR' => 'Could not connect to dnas-server!'); 
}

$data = array();
$data['songinfo'] = $dnas_data['SONGTITLE'];
echo json_encode($data);
?>