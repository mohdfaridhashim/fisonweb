<?php
class story_controller
{
var $bil =1;
//constructor
public function __construct()  {
}

public function main()
{
	//class function
	$function = array();
	$function[0][0] = "get_story";  //name of the function
	$function[0][1] = "true";  //return of a function as a variable


	return $function;
}
public function get_num_func()
{	
	return $this->bil;
}
//user define view
public function view()
{
	//user define view file
	return "news4.php";
}
public function view_option()
{
	//include user define view or replace default view
	//option included, excluded
	return "excluded";
}

public function get_story()
{
		//$bodypattern = "/<body[^>]*>(.*?)<\/body>/is";
  		//$bodyendpattern = "<\/body>/is";
		$begining_match = '<body>'; 
		$end_match = '</body>'; 
	//if(isset($_GET['newsid']))&&(isset($_GET['sourceid']))&&(isset($_GET['categoryid']))
	if(isset($_GET['newsid']))
	{
		$source = $_GET['news'];
		if(isset($_GET['categoryid']))
		{
		$categoryid = $_GET['categoryid'];
		}
		else
		{
		$categoryid = "";
		}
		if(isset($_GET['sourceid']))
		{
		$sourceid = $_GET['sourceid'];
		}
		else
		{
		$sourceid = "";
		}
		
		if($source == "DowJones")
		{
		$story =file_get_contents("http://203.106.7.204/dowjonesnews/DowJonesDetails.aspx?newsid=".$_GET['newsid']."&categoryid=".$categoryid."&sourceid=".$sourceid);
		//$extracted_contens = preg_replace("/\$begining_match([a-z0-9\.])\$end_match/i", "\\1", $story); 
		$extracted_contens = preg_replace("/.*<body[^>]*>|<\/body>.*/si", "", $story);

  		//$noheader = eregi_replace($bodypattern, "", $story);

  		//$noheader = eregi_replace($bodyendpattern, "", $noheader);
  		//$noheader = preg_replace($bodypattern, "", $story);

  		//$noheader = preg_replace($bodyendpattern, "", $noheader);
		}
		else if($source == "Bernama")
		{
		//$story = "not yet";
		//$story =file_get_contents("http://203.106.7.204/dowjonesnews/DowJonesDetails.aspx?newsid=".$_GET['newsid']."&categoryid=".$categoryid."&sourceid=".$sourceid);
		$story =file_get_contents("http://203.106.7.204/dowjonesnews/DowJonesDetails.aspx?newsid=".$_GET['newsid']."&categoryid=".$categoryid."&sourceid=".$sourceid);
		$extracted_contens = preg_replace("/.*<body[^>]*>|<\/body>.*/si", "", $story);

		}
		else if($source == "Bursa")
		{
		//$story = "not yet";
		//$story =file_get_contents("http://203.106.7.204/dowjonesnews/DowJonesDetails.aspx?newsid=".$_GET['newsid']."&categoryid=".$categoryid."&sourceid=".$sourceid);
		$story =file_get_contents("http://203.106.7.204/dowjonesnews/DowJonesDetails.aspx?newsid=".$_GET['newsid']."&categoryid=".$categoryid."&sourceid=".$sourceid);
		$extracted_contens = preg_replace("/.*<body[^>]*>|<\/body>.*/si", "", $story);

		}
	}
	return $extracted_contens;
}

//end of class
}