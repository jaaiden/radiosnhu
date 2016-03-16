<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function getSongInfo()
	{
		/*

		Now Playing PHP script for SHOUTcast

		This script is (C) MixStream.net 2008

		Feel free to modify this free script
		in any other way to suit your needs.

		Version: v1.1

		*/

		/* ----------- Server configuration ---------- */

		$ip = "localhost";
		$port = "8000";

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
				return "Not Available"; // Diaplays when sever is online but no song title
			}
			else
			{
				$title = str_replace('\'', '`', $split[6]);
				$title = str_replace(',', ' ', $title);
				$titlepadded = " // " . $title;
				return htmlspecialchars_decode($title, ENT_QUOTES); // Diaplays song
			}
		}
	}

	public function getListenerCount()
	{
		$url = file_get_contents("http://radio.snhu.edu:8000/stats?sid=1.xml");
		$xml = simplexml_load_string($url);
		return $xml->CURRENTLISTENERS;
	}

	public function sendMail()
	{
		$name = Input::get('name');
		$email = Input::get('email');
		$subject = Input::get('subject');
		$msg = Input::get('message');

		Mail::send('emails.request', array('name' => $name, 'email' => $email, 'subject' => $subject, 'msg' => $msg), function($message)
		{
			$message->from(Input::get('email'), Input::get('name'));
		    $message->to('radiosnhu@snhu.edu', 'RadioSNHU')->subject('DJ Request!');
		});

		return Redirect::to('djbookings');
	}

	public function getShowInfo()
	{
		$dt = Carbon::now('America/New_York');
		$curshow = Shows::today()->where('starttime', '<', $dt->hour . ':' . $dt->minute . ':' . $dt->second)->where('endtime', '>', $dt->hour . ':' . $dt->minute . ':' . $dt->second)->first();
		if($curshow)
		{
			return $curshow->showname;
		}else
		{
			return "RadioSNHU Infinite Playlist";
		}
	}
	
	public function getNextShow()
	{
  	$dt = Carbon::now('America/New_York');
  	$nextshow = null;
  	$showstoday = json_decode(json_encode((array) Shows::today()->get()), true);
  	
  	$curshow = Shows::today()->where('starttime', '<', $dt->hour . ':' . $dt->minute . ':' . $dt->second)->where('endtime', '>', $dt->hour . ':' . $dt->minute . ':' . $dt->second)->first();
  	$curindex = array_search($curshow, $showstoday);
  	
  	if($curshow == end($showstoday))
  	{
    	$nextshow = "RadioSNHU Infinite Playlist";
  	}elseif($showstoday[""][0]["starttime"] > ($dt->hour . ":" . $dt->minute . ":" . $dt->second))
  	{
    	$nextshow = $showstoday[""][$curindex]["showname"] . ' with ' . $showstoday[""][$curindex]["hosts"] . ' at ' . date('g:i a', strtotime($showstoday[""][$curindex]["starttime"]));
  	}else
  	{
      $nextshow = $showstoday[""][$curindex+2]["showname"] . ' with ' . $showstoday[""][$curindex+2]["hosts"] . ' at ' . date('g:i a', strtotime($showstoday[""][$curindex+2]["starttime"]));	
  	}
  	
  	return $nextshow;
	}

}
