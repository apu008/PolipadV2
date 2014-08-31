<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	function formatTextToHTML($text)

	{

		return str_replace("\n", "<br>", $text); // add &nbsp; to allow html multi-line breaks

	}

	function formatHTMLToText($html)

	{

		return str_replace("<br>", "\n", $html);

	}
	
	function mkUnixTime($date)
	{
		$date = explode('/', $date);
		
		if(substr($date[0],0,-1) == 0)
			$month = substr($date[0],1);
		else
			$month = $date[0];

		if(substr($date[1],0,-1) == 0)
			$day = substr($date[1],1);
		else
			$day = $date[1];
		$year = $date[2];
		
		return mktime(0, 0, 0, $month, $day, $year);
	} 
?>