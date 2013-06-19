<?php
class fullnews
{

function get_full_news($nid,$sid,$catid)
{
	$display = file_get_contents("http://203.106.7.204/dowjonesnews/DowJonesDetails.aspx?newsid=".$nid."&categoryid=".$catid."&sourceid=".$sid);
	return $display ;
}



}



?>